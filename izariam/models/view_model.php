<?php
/*
 * Project: iZariam
 * Edited: 26/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
/**
 * Model of the central display
 */
class View_Model extends Model
{
    function View_Model() {
        // Call the Model constructor
        parent::Model();
    }

    function show_bread($location = 'city', $param1, $param2, $param3) {
        switch($location) {
            case 'armyGarrisonEdit': $location = 'barracks'; break;
            case 'fleetGarrisonEdit': $location = 'shipyard'; break;
        }
        $caption = $this->Data_Model->building_name_by_type($this->Data_Model->building_type_by_class($location));
        @$pos_text = 'pos'.$param1.'_type';
        @$type = ($param1 > 0 and $param1 <= 15) ? $this->Player_Model->now_town->$pos_text : $this->Data_Model->building_type_by_class($location);
        switch($location) {
            case 'abolishColony': $caption = $this->lang->line('leave_colony'); $file = 'building'; $type = 1; break;
            case 'admin': $caption = 'Admin'; $file = 'world'; break;
            case 'buildingDetail': $caption = $this->lang->line('building_info'); $file = 'world'; break;
            case 'cityMilitary': $caption = $this->lang->line('military_advisor_title'); $file = 'town'; break;
            case 'colonize': $caption = $this->lang->line('colonize'); $file = '_island'; break;
            case 'credits': $caption = $this->lang->line('credits'); $file = 'world'; break;
            case 'demolition': $caption = $this->lang->line('confirm'); $file = 'building'; break;
            case 'diplomacyAdvisor':
            case 'diplomacyAdvisorOutBox': $caption = $this->lang->line('diplomatic_advisor'); $file = 'world'; break;
            case 'error': $caption = $this->lang->line('error'); $file = 'null'; break;
            case 'finances': $caption = $this->lang->line('finances'); $file = 'null'; break;
            case 'highscore': $caption = $this->lang->line('top_list'); $file = 'null'; break;
            case 'merchantNavy': $caption = $this->lang->line('merchant_navy'); $file = 'null'; break;
            case 'militaryAdvisorCombatReports':
            case 'militaryAdvisorCombatReportsArchive':
            case 'militaryAdvisorMilitaryMovements': $caption = $this->lang->line('military_advisor'); $file = 'world'; break;
            case 'options': $caption = $this->lang->line('options'); $file = 'null'; break;
            case 'options_deletion_confirm': $caption = $this->lang->line('settings'); $file = 'null'; break;
            case 'premium':
            case 'premiumDetails':
            case 'premiumPayment': $caption = $this->lang->line('izariam_plus'); $file = 'null'; break;
            case 'premiumTradeAdvisor': $caption = $this->lang->line('constructions_review'); $file = 'tradeAdvisor'; break;
            case 'renameCity': $caption = $this->lang->line('rename_city'); $file = 'building'; $type = 1; break;
            case 'researchAdvisor': $caption = $this->lang->line('research_advisor'); $file = 'world'; break;
            case 'researchDetail': $caption = $this->lang->line('research_detail'); $file = 'null'; break;
            case 'researchOverview': $caption = $this->lang->line('library'); $file = 'building'; $type = 3; break;
            case 'safehouseMissions': $caption = $this->lang->line('missions'); $file = 'building'; $type = 14; break;
            case 'safehouseReports': $caption = $this->lang->line('esp_report'); $file = 'building'; $type = 14; break;
            case 'sendIKMessage': $caption = $this->lang->line('create_message'); $file = 'world'; break;
            case 'sendSpy': $caption = $this->lang->line('send_spy'); $file = '_island'; break;
            case 'takeOffer': if ($param2 == 0) { $caption = $this->lang->line('accept_rate'); } else { $caption = $this->lang->line('accept_offer'); } $file = 'building'; $type = 12; break;
            case 'tradeAdvisor':
            case 'tradeAdvisorTradeRoute': $caption = $this->lang->line('mayor'); $file = 'world'; break;
            case 'transport': $caption = $this->lang->line('transport'); $file = '_island'; break;
            case 'version': $caption = $this->lang->line('changelog'); $file = 'world'; break;
            case 'wonderDetail': $caption = $this->lang->line('wonder_info'); $file = 'world'; break;
            case 'academy':
            case 'alchemist':
            case 'barracks':
            case 'branchOffice':
            case 'buildingGround':
            case 'carpentering':
            case 'forester':
            case 'glassblowing':
            case 'palace':
            case 'palaceColony':
            case 'port':
            case 'tavern':
            case 'townHall':
            case 'safehouse':
            case 'shipyard':
            case 'stonemason':
            case 'wall':
            case 'warehouse':
            case 'winegrower': $file = 'town'; break;
            default: $file = $location; break;
        }
        $this->load->view('bread/'.$file, array('caption' => $caption, 'type' => $type));
    }

    /**
     * Displaying the left side
     * @param <string> $location
     */
    function show_sidebox($location = 'city', $param1, $param2, $param3) {
        switch($location) {
            case 'diplomacyAdvisorOutBox': $location = 'diplomacyAdvisor'; break;
        }
        switch($location) {
            case 'demolition': $this->load->view('sidebox/'.$location, array('position' => $param1)); break;
            case 'cityMilitary': $this->load->view('sidebox/cityMilitary', array('type' => $param1)); break;
            case 'informations': $this->load->view('sidebox/'.$location, array('id' => $param1)); break;
            case 'options': $this->load->view('sidebox/inviteFriends'); break;
            case 'worldmap_iso': $this->load->view('sidebox/'.$location, array('x' => $param1, 'y' => $param2)); break;
            case 'abolishColony':
            case 'credits':
            case 'error':
            case 'finances':
            case 'version': $this->load->view('sidebox/backToCity'); break;
            case 'researchDetail':
            case 'wonderDetail':
            case 'buildingDetail':
            case 'pedia': $this->load->view('sidebox/'.$location, array('id' => $param1)); break;
            case 'academy':
            case 'alchemist':
            case 'barracks':
            case 'branchOffice':
            case 'carpentering':
            case 'forester':
            case 'glassblowing':
            case 'palace':
            case 'palaceColony':
            case 'port':
            case 'safehouse':
            case 'shipyard':
            case 'stonemason':
            case 'tavern':
            case 'townHall':
            case 'wall':
            case 'warehouse':
            case 'winegrower': $this->load->view('sidebox/update', array('type' => $this->Data_Model->building_type_by_class($location), 'position' => $param1));
            case 'armyGarrisonEdit':
            case 'city':
            case 'diplomacyAdvisor':
            case 'fleetGarrisonEdit':
            case 'island':
            case 'merchantNavy':
            case 'premium':
            case 'premiumDetails':
            case 'premiumPayment':
            case 'premiumTradeAdvisor':
            case 'renameCity':
            case 'researchAdvisor':
            case 'researchOverview':
            case 'resource':
            case 'safehouseMissions':
            case 'safehouseReports':
            case 'takeOffer':
            case 'tradeAdvisor':
            case 'highscore':
            case 'tradegood': $this->load->view('sidebox/'.$location); break;
            case 'colonize':
            case 'plunder':
            case 'sendSpy':
            case 'transport': $this->load->view('sidebox/back_to_island'); break;
            case 'militaryAdvisorCombatReportsArchive': $this->load->view('sidebox/militaryAdvisorCombatReportsArchive');
            case 'militaryAdvisorCombatReports':
            case 'militaryAdvisorMilitaryMovements': $this->load->view('sidebox/militaryOverview'); break;
            default: break;
        }
    }

    /**
     * The mapping study
     * @param <string> $location
     */
    function show_tutorial($location, $id) {
        switch($this->Player_Model->user->tutorial) {
            // welcome
            case 0: $this->load->view('tut/0',array('location' => $location)); break;
            // recruitment of of workers
            case 1: $this->load->view('tut/1',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 2: $this->load->view('tut/1',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // The construction of Academy
            case 3: $this->load->view('tut/2',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 4: $this->load->view('tut/2',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // recruitment of scientists
            case 5: $this->load->view('tut/3',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 6: $this->load->view('tut/3',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // The construction of barracks
            case 7: $this->load->view('tut/4',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 8: $this->load->view('tut/4',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Recruitment of spearman
            case 9: $this->load->view('tut/5',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 10: $this->load->view('tut/5',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // The construction of the wall
            case 11: $this->load->view('tut/6',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // The construction of the port
            case 12: $this->load->view('tut/7',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 13: $this->load->view('tut/7',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // upgrade buildings
            case 14: $this->load->view('tut/8',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 15: $this->load->view('tut/8',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // The attack on the barbarians
            //case 16: $this->load->view('tut/9',array('location' => $location, 'active' => true, 'id' => $id)); break;
            //case 17: $this->load->view('tut/9',array('location' => $location, 'active' => false, 'id' => $id)); break;
            case 'abolishColony':
        }
    }

    /**
     * The main display
     * @param <string> $location
     * @param <int> $position
     */
    function show_view($location = 'city', $param1, $param2, $param3) {
        switch($location) {
            case 'worldmap_iso': $this->load->view('view/'.$location, array('x' => $param1, 'y' => $param2)); break;
            case 'colonize': $this->load->view('view/'.$location, array('id' => $param1, 'position' => $param2)); break;
            case 'abolishColony':
            case 'academy':
            case 'admin':
            case 'alchemist':
            case 'armyGarrisonEdit':
            case 'barracks':
            case 'branchOffice':
            case 'buildingDetail':
            case 'buildingGround':
            case 'carpentering':
            case 'city':
            case 'cityMilitary':
            case 'credits':
            case 'demolition':
            case 'diplomacyAdvisor':
            case 'diplomacyAdvisorOutBox':
            case 'error':
            case 'finances':
            case 'fleetGarrisonEdit':
            case 'forester':
            case 'glassblowing':
            case 'highscore':
            case 'informations':
            case 'island':
            case 'merchantNavy':
            case 'militaryAdvisorCombatReports':
            case 'militaryAdvisorCombatReportsArchive':
            case 'militaryAdvisorMilitaryMovements':
            case 'options':
            case 'options_deletion_confirm':
            case 'palace':
            case 'palaceColony':
            case 'pedia':
            case 'plunder':
            case 'port':
            case 'premium':
            case 'premiumDetails':
            case 'premiumPayment':
            case 'premiumTradeAdvisor':
            case 'renameCity':
            case 'researchAdvisor':
            case 'researchDetail':
            case 'researchOverview':
            case 'resource':
            case 'safehouse':
            case 'safehouseMissions':
            case 'safehouseReports':
            case 'sendIKMessage':
            case 'sendSpy':
            case 'shipyard':
            case 'stonemason':
            case 'takeOffer':
            case 'tavern':
            case 'townHall':
            case 'tradeAdvisor':
            case 'tradeAdvisorTradeRoute':
            case 'tradegood':
            case 'transport':
            case 'wall':
            case 'warehouse':
            case 'winegrower':
            case 'version':
            case 'wonderDetail': $this->load->view('view/'.$location); break;
            default: $this->load->view('view/null'); break;
        }
    }
}