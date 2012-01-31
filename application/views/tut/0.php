<style>
#tutorialAdvisor { 
    position: absolute;
    top: 185px;
    left: 260px;
    z-index: 50;
}

#tutorialMessage {
    position: absolute;
    top: 185px;
    left: 360px;
    z-index: 50;
    color: #542c0f;
    width: 560px;
     /* height: 340px; */
    display: none;
    z-index: 20000;
}
#tutorialMessage h3 {
    background-color:transparent;
    background-image:url(<?=$this->config->item('style_url')?>skin/tutorial/headerbg.gif);
    height:20px;
    padding-top:10px;
    padding-left:10px;
    font-weight:bold;
}
#tutorialMessage .content {
    background-image:url(<?=$this->config->item('style_url')?>skin/tutorial/contentbg.gif);

}

#tutorialMessage .content p {
    padding: 10px;
}

#tutorialMessage .footer {
    background-image:url(<?=$this->config->item('style_url')?>skin/tutorial/footerbg.gif);
    background-repeat:no-repeat;
    height:6px;
    line-height:1px;
    font-size:0px;
    padding:0px;
}

#arrow {
    position: absolute;
    top: 185px;
    left: 360px;
    width: 40px;
    height: 48px;
    z-index: 10000;
    background-image: url('<?=$this->config->item('style_url')?>skin/tutorial/arrow.gif');
    display: none;
}

#tutorialAdvisor div a {
    display: block;
    width: 66px;
    height: 67px;
}

#tutorialAdvisor div {
    background-image: url('<?=$this->config->item('style_url')?>skin/tutorial/advisors.gif');
    width: 66px;
    height: 67px;
}
#tutorialAdvisor div.lighten {
    background-image: url('<?=$this->config->item('style_url')?>skin/tutorial/advisors_lighten.gif');
    width: 66px;
    height: 67px;
}

#tutorialAdvisorCloseLink {
    background-image:url(<?=$this->config->item('style_url')?>skin/layout/notice_close.gif);
    position:absolute;
    left:535px;
    top:9px;
    height:18px;
    width:18px;
    cursor:pointer;

}

#tutorialAdvisorCloseLink:hover {
    background-image:url(<?=$this->config->item('style_url')?>skin/layout/notice_close_hover.gif);
}

.allAdvisors { background-position: 0px 0px; }
.researchAdvisor { background-position: -66px 0px; }
.cityAdvisor { background-position: -132px 0px; }
.diplomacyAdvisor { background-position: -198px 0px; }
.militaryAdvisor { background-position: -264px 0px; }
.workerAdvisor { background-position: -330px 0px; }
.invisible { display: none; }
#TutorialCheckboxImg {
    vertical-align: top;
    margin: 0 5px 0 0;
}
</style>

<div id="arrow">
</div>
<div id="tutorialAdvisor">
    <div id="advisorImage" class="allAdvisors"><a href="javascript:;" id="tutorialAdvisorLink" title="Tutorial"></a></div>
</div>
<div id="tutorialMessage">
    <h3>Tutorial</h3>
    <a href="javascript:;" id="tutorialAdvisorCloseLink"></a>
    <div class="content">
    <p>Welcome to the relm of Ikaria,<br />
We are your advisers and we will describe to you about all outstanding events, connected with your cities, military actions, research and diplomacy.<br />
<br />
We will appear at the beginning of every game and will describe about the first major steps into the game. If our help is necessary to you, press on the symbols in the upper left side of the play window. </p>

        <div class="centerButton"><a href="javascript:;" id="okButton" class="button">ОК</a></div>
    <div class="footer"></div>
    </div>
</div>

<script language="javascript">

var counter = 0;
var startY = 0;
var startX = 0;

var defaultClass = "allAdvisors" ;
Dom.get("advisorImage").onmouseover = function() {
    Dom.get("advisorImage").className = "allAdvisors lighten";
};
Dom.get("advisorImage").onmouseout = function() {
    Dom.get("advisorImage").className = defaultClass;
};

function Tutorial() {

    var that = this;
    var arrow = Dom.get("arrow");

    this.showMessage = function() {

        Dom.get("tutorialMessage").style.display = "block";
    }

    this.hideMessage = function() {
        Dom.get("tutorialMessage").style.display = "none";
    }

    this.goToNextState = function() {
        ajaxRequest("<?=$this->config->item('base_url')?>actions/tutorials/next/");
    }

    this.showMessageAndGoToNextState = function() {
        Dom.get("tutorialAdvisorLink").onclick = function() {
            that.showMessage();
            that.goToNextState();
            defaultClass = "allAdvisors";
            Dom.get("advisorImage").className = "allAdvisors";
        }
    }

    this.registerDefaultBehavior = function() {
        Dom.get("tutorialAdvisorLink").onclick = that.showMessage;

        Dom.get("okButton").onclick = function() {
                     that.hideMessage();
        };

        Dom.get("tutorialAdvisorCloseLink").onclick = that.hideMessage;
    }

    this.animateArrow = function() {
        clearInterval(this.interval);
        arrow.style.left = startX + "px";
        arrow.style.top = startY + "px";
        arrow.style.display = "block";
        this.interval = setInterval(function() { that.updateArrow(startY) ; }, 10);
    }

    this.animateArrowOnResView = function() {
        arrow.style.left = startX + "px";
        arrow.style.top = startY + "px";
        arrow.style.display = "block";
        this.interval = setInterval(function() { that.updateArrowOnResView(startX, startY) ; }, 10);
    }

    this.updateArrow = function(startY) {
        counter++;
        arrow.style.top = (startY + (Math.sin(counter/15) * 10)) + "px";
    }

    this.updateArrowOnResView = function(startX, startY) {
        counter++;
        arrow.style.top = (startY + (Math.sin(counter/30) * 40)) + "px";
        arrow.style.left = (startX - (Math.cos(counter/30) * 200)) + "px";
    }

    this.animateArrowOnClose = function() {
        Dom.get("tutorialAdvisorCloseLink").onclick = function() {
            that.hideMessage();
            that.animateArrow();
        }
        Dom.get("okButton").onclick = function() {
                      that.hideMessage();
            that.animateArrow();
        };
    }
    this.onClickBarbarianVillage = function() {
        var links = document.getElementsByTagName("a");
        for (i=0; i<links.length; i++) {
            console.log(i);
            if (links[i].onclick != '') {
                links[i].onmouseup = function() {
                    if (startX != 0) {
                        startY = 0;
                        startX = 0;
                        that.animateArrow();
                    }
                }
            }
        }

        Dom.get("barbarianLink").onmouseup = function() {
            startY = 270;
            startX = 20;
            that.animateArrow();
        };
    }

}


Event.onDOMReady(function() {
	//Javascript: var MyTutorial = new Tutorial(); MyTutorial.animateArrow();
    var MyTutorial = new Tutorial();
        MyTutorial.registerDefaultBehavior();
       // MyTutorial.animateArrow();
    MyTutorial.showMessage();
MyTutorial.goToNextState();
});

</script>