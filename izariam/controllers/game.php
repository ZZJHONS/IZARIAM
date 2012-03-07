<?
/*
 * Project: iZariam
 * Edited: 12/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
class Game extends Controller {

    function Game() {

        parent::Controller();

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Cache-Control: post-check=0,pre-check=0", false);
        header("Cache-Control: max-age=0", false);
        header("Pragma: no-cache");

        $this->load->model('Player_Model');
        if (!$this->session->userdata('login')) {
            $this->Player_Model->Error($this->lang->line('error_session'));
        } else {
            // Load the user
            $this->Player_Model->Load_Player($this->session->userdata('id'));
            if (isset($_POST['cityId']) and isset($this->Data_Model->temp_towns_db[$_POST['cityId']]) and $_POST['cityId'] > 0) {
                $this->Player_Model->town_id = ($_POST['cityId'] > 0) ? intval($_POST['cityId']) : $this->Player_Model->town_id;
                $this->Player_Model->now_town = $this->Player_Model->towns[$this->Player_Model->town_id];
                $this->db->set('town', $this->Player_Model->town_id);
                $this->db->where(array('id' => $this->Player_Model->user->id));
                $this->db->update($this->session->userdata('universe').'_users');
            }
            $this->load->model('Update_Model');
            // Note the building in line on the map
            $this->Player_Model->correct_buildings();
            $this->Player_Model->Load_New_Town_Messages();
            $this->Player_Model->Load_New_User_To_Messages();
            $this->load->model('View_Model');
        }
    }

    // Default Page
    function index() {
        $this->show('city');
    }

    function abolishColony() {
        $this->show('abolishColony');
    }

    /**
     * Academy
     * @param <int> $position
     */
    function academy() {
        $position = $this->Data_Model->get_position(3, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_academy_null'));
        } else {
            $this->show('academy', $position);
        }
    }

    function admin() {
        $this->show('admin');
    }

    function alchemist($position = 0) {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 20) {
            $this->show('error',$this->lang->line('alchemist_not_built'));
        } else {
            $this->show('alchemist', $position);
        }
    }

    /**
     * The dissolution of the army
     */
    function armyGarrisonEdit() {
        $position = $this->Data_Model->get_position(5, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error','Казарма еще не построена!');
        } else {
            $this->show('armyGarrisonEdit', $position);
        }
    }

    /**
     * Notes
     */
    function avatarNotes() {
        $this->load->helper('cookie');
        $this->load->view('avatarNotes');
    }

    /**
     * Barracks
     * @param <int> $position
     */
    function barracks() {
        $position = $this->Data_Model->get_position(5, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_barracks_null'));
        } else {
            $this->show('barracks', $position);
        }
    }

    function branchOffice($position = 0, $desc = 'ressDesc') {
        $position = $this->Data_Model->get_position(12, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_branch_office_null'));
        } else {
            $this->show('branchOffice', $position, $desc);
        }
    }

    /**
     * Information about the building
     * @param <int> $id
     */
    function buildingDetail($id = 1) {
        $this->show('buildingDetail', $id);
    }

    /**
     * Home buildings
     * @param <int> $position
     */
    function buildingGround($position = 0) {
        if ($position > 0) {
            $level = 'pos'.$position.'_level';
            if ($this->Player_Model->now_town->$level == 0) {
                $this->show('buildingGround', $position);
            } else {
                $this->show('error',$this->lang->line('error_buildingground_null'));
            }
        } else {
            $this->city();
        }
    }

    function carpentering() {
        $position = $this->Data_Model->get_position(21, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_carpentering_null'));
        } else {
            $this->show('carpentering', $position);
        }
    }

    function city($id = 0, $relocation = 'city', $reposition = 0) {
        if ($id > 0 and $id != $this->Player_Model->town_id and isset($this->Data_Model->temp_towns_db[$id]) and $this->Data_Model->temp_towns_db[$id]->user == $this->Player_Model->user->id) {
            // Change city
            $this->Player_Model->town_id = $id;
            $this->Player_Model->now_town = $this->Player_Model->towns[$id];
            // Write to the database
            $this->db->set('town', $this->Player_Model->town_id);
            $this->db->where(array('id' => $this->Player_Model->user->id));
            $this->db->update($this->session->userdata('universe').'_users');
        }
        if ($relocation != 'city') {
            $this->$relocation($reposition);
        } else {
            $this->index();
        }
    }

    function cityMilitary($type = 'army'){
        $this->show('cityMilitary', $type);
    }

    function colonize($island = 0, $position = 0) {
        if ($island == 0) {
            $island = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($island);
        $city_text = 'city'.$position;
        if($this->Island_Model->island->$city_text > 0) {
            $this->show('error',$this->lang->line('build_site_occupied'));
        } else {
            $this->show('colonize', $island, $position);
        }
    }

    function credits() {
        $this->show('credits');
    }

    /**
     * Confirmation of demolition
     * @param <int> $position
     */
    function demolition($position = 0) {
        $this->show('demolition', $position);
    }

    function diplomacyAdvisor() {
        $this->Player_Model->Load_User_Messages();
        $this->show('diplomacyAdvisor');
    }

    function diplomacyAdvisorOutBox() {
        $this->Player_Model->Load_User_Messages();
        $this->show('diplomacyAdvisorOutBox');
    }

    function error(){
        $this->show('error');
    }

    function finances() {
        $this->show('finances');
    }

    function fleetGarrisonEdit() {
        $position = $this->Data_Model->get_position(4, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error','Верфь еще не построена!');
        } else {
            $this->show('fleetGarrisonEdit', $position);
        }
    }

    function forester($position = 0) {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 16) {
            $this->show('error',$this->lang->line('forester_not_built'));
        } else {
            $this->show('forester', $position);
        }
    }

    function glassblowing($position = 0) {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 18) {
            $this->show('error',$this->lang->line('glass_blowing_not_built'));
        } else {
            $this->show('glassblowing', $position);
        }
    }

    function highscore() {
        $options['offset'] = (isset($_POST['offset']) and $_POST['offset'] > 0) ? $_POST['offset'] : 0;
        $options['highscoreType'] = isset($_POST['highscoreType']) ? $_POST['highscoreType'] : 'score';
        $users = $this->db->get($this->session->userdata('universe').'_users');
        $this->db->order_by("points", "desc");
        switch($options['highscoreType']) {
            case 'building_score_main': $this->db->order_by("points_buildings", "desc"); break;
            case 'building_score_secondary': $this->db->order_by("points_levels", "desc"); break;
            case 'research_score_main': $this->db->order_by("points_research", "desc"); break;
            case 'research_score_secondary': $this->db->order_by("points_complete", "desc"); break;
            case 'army_score_main': $this->db->order_by("points_army", "desc"); break;
            case 'trader_score_secondary': $this->db->order_by("points_gold", "desc"); break;
            default: $this->db->order_by("points", "desc"); break;
        }
        $users100 = $this->db->get($this->session->userdata('universe').'_users', 100, $options['offset']*100);
        $this->show('highscore', $users, $users100, $options);
    }

    /**
     * Help
     * @param <int> $id
     */
    function informations($id = 6) {
        $this->show('informations', $id);
    }

    /**
     * Islands page
     * @param <int> $id
     */
    function island($id = 0, $town = -1) {
        if ($id == 0) {
            $id = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $this->show('island', $id, $town);
    }

    function logout() {
        $this->session->unset_userdata('login');
        redirect('/', 'refresh');
    }

    function merchantNavy() {
        $this->show('merchantNavy');
    }

    function militaryAdvisorCombatReports() {
        $this->show('militaryAdvisorCombatReports');
    }

    function militaryAdvisorCombatReportsArchive() {
        $this->show('militaryAdvisorCombatReportsArchive');
    }

    function militaryAdvisorMilitaryMovements() {
        $this->show('militaryAdvisorMilitaryMovements');
    }

    function options($option = 'account', $email = '') {
        $view = array('account', 'game', 'sso', 'openid');
        $show = (in_array($option, $view)) ? $option : 'account';
        $send = ($email == 'sended' or $email == 'nosended') ? $email : '';
        $this->show('options', $show, $send);
        /*if($option == 'account' or $option == 'game' or $option == 'sso' or $option == 'openid') {
            $this->show('options', $option);
        } else {
            $this->show('options', 'account');
        }*/
    }

    function options_deletion_confirm() {
        $this->show('options_deletion_confirm');
    }

    function palace() {
        $position = $this->Data_Model->get_position(10, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_palace_null'));
        } else {
            $this->show('palace', $position);
        }
    }

    function palaceColony($action = '') {
        $position = $this->Data_Model->get_position(15, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_palace_colony_null'));
        } else {
            $this->show('palaceColony', $position, $action);
        }
    }

    /**
     * Pedia
     * @param <int> $id
     */
    function pedia($id = 10) {
        $this->show('pedia', $id);
    }

    function plunder($island = 0, $id = 0) {
       if($island > 0 and $id >= 0) {
           if(isset($this->Data_Model->temp_towns_db[$id]) and $this->Data_Model->temp_towns_db[$id]->user == $this->Player_Model->user->id) {
               $this->show('error', $this->lang->line('not_rob_your_city'));
           } else {
               if ($island == 0) {
                   $island = $this->Player_Model->island_id;
               }
               $this->load->model('Island_Model');
               $this->Island_Model->Load_Island($island);
               $this->show('plunder', $id);
           }
       } else {
           $this->show('error', $this->lang->line('city_not_found'));
       }
    }

    function port() {
        $position = $this->Data_Model->get_position(2, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_port_null'));
        } else {
            $this->show('port', $position);
        }
    }

    /**
     * Premium features
     */
    function premium() {
        $this->show('premium');
    }

    function premiumDetails() {
        $this->show('premiumDetails');
    }

    /**
     * Preparation of Ambrosia
     */
    function premiumPayment() {
        $this->show('premiumPayment');
    }

    function premiumTradeAdvisor($page = 'resources') {
        if($this->Player_Model->user->premium_account > 0) {
            $this->show('premiumTradeAdvisor', $page);
        } else {
            $this->tradeAdvisor();
        }
        
    }

    function renameCity() {
        $this->show('renameCity');
    }

    /**
     * Advisor for Research
     */
    function researchAdvisor() {
        $this->show('researchAdvisor');
    }

    function researchOverview() {
        $position = $this->Data_Model->get_position(3, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('academy_not_built'));
        } else {
            $this->show('researchOverview');
        }
    }

    /**
     * Information for Research
     * @param <int> $way
     * @param <int> $id
     */
    function researchDetail($way = 1, $id = 1) {
        if ($way == 2){$id = $id + 14;}
        if ($way == 3){$id = $id + 14+15;}
        if ($way == 4){$id = $id + 14+15+16;}
        $this->show('researchDetail', $id);
    }

    /**
     * Forest
     * @param <int> $id
     */
    function resource($id = 0) {
        $town_id = 0;
        if ($id > 0 and $id != $this->Player_Model->island_id and isset($this->Data_Model->temp_islands_db[$id])) {
            foreach ($this->Player_Model->towns as $town)
                if ($town->island == $id) $town_id = $town->id;
            if ($town_id > 0 and isset($this->Player_Model->towns[$town_id])) {
                // Chance city
                $this->Player_Model->town_id = $town_id;
                $this->Player_Model->now_town = $this->Player_Model->towns[$town_id];
                // Write to the database
                $this->db->set('town', $town_id);
                $this->db->where(array('id' => $this->Player_Model->user->id));
                $this->db->update($this->session->userdata('universe').'_users');
            }
        }
        if ($id == 0) {
            $id = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $this->show('resource', $id);
    }

    function safehouse($page = 'safehouse') {
        $position = $this->Data_Model->get_position(14, $this->Player_Model->now_town);
        foreach($this->Player_Model->spyes[$this->Player_Model->town_id] as $spy) {
            $this->Data_Model->Load_Town($spy->to);
            $this->Data_Model->Load_Island($this->Data_Model->temp_towns_db[$spy->to]->island);
        }
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_safehouse_null'));
        } else {
            if ($page == 'reports') {
                $this->Player_Model->Load_Spyes_Messages();
            }
            $this->show('safehouse', $position, $page);
        }
    }

    function safehouseMissions($spy = 0) {
        if ($spy > 0 and isset($this->Player_Model->spyes[$this->Player_Model->town_id][$spy])) {
            $this->Data_Model->Load_Town($this->Player_Model->spyes[$this->Player_Model->town_id][$spy]->to);
            $this->show('safehouseMissions', $spy);
        } else {
            $this->show('error',$this->lang->line('spy_not_found'));
        }
    }

    function safehouseReports($id = 0) {
        $message_query = $this->db->get_where($this->session->userdata('universe').'_spy_messages', array('id' => $id), 1, '');
        $message = $message_query->row();
        if ($id > 0 and $message_query->num_rows == 1 and $message->user == $this->Player_Model->user->id) {
            $this->Data_Model->Load_Town($message->to);
            $this->show('safehouseReports', $message);
        } else {
            $this->show('error',$this->lang->line('report_not_found'));
        }
    }

    function sendIKMessage($id = 0, $island = 0) {
        if ($id > 0 and $id != $this->Player_Model->user->id) {
            $this->Data_Model->Load_User($id);
            if (isset($this->Data_Model->temp_users_db[$id])) {
                $this->show('sendIKMessage', $id, $island);
            } else {
                $this->show('error',$this->lang->line('player_not_found'));
            }
        } else {
            $this->show('error',$this->lang->line('not_message_yourself'));
        }
    }

    function sendSpy($island = 0, $id = 0) {
        if ($island == 0) {
            $island = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($island);
        $this->Data_Model->Load_Town($id);
        if(!isset($this->Data_Model->temp_towns_db[$id]) or $this->Data_Model->temp_towns_db[$id]->island != $this->Island_Model->island->id) {
            $this->show('error',$this->lang->line('city_not_found'));
        } else {
            $this->show('sendSpy', $id);
        }
    }

    function shipyard() {
        $position = $this->Data_Model->get_position(4, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_shipyard_null'));
        } else {
            $this->show('shipyard', $position);
        }
    }

    function show($location, $param1 = 0, $param2 = 0, $param3 = 0) {
        $this->load->view('game_index',array('page' => $location, 'param1' => $param1, 'param2' => $param2, 'param3' => $param3));
    }

    function stonemason($position = 0) {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 17) {
            $this->show('error',$this->lang->line('stonemason_not_built'));
        } else {
            $this->show('stonemason', $position);
        }
    }

    function takeOffer($town = 0, $type = 0, $resource = 0) {
        $this->show('takeOffer', $town, $type, $resource);
    }

    function tavern() {
        $position = $this->Data_Model->get_position(8, $this->Player_Model->now_town);
        if ($position == 0) {
            $this->show('error',$this->lang->line('error_tavern_null'));
        } else {
            $this->show('tavern', $position);
        }
    }

    /**
     * Town hall
     * @param <int> $position
     */
    function townHall() {
        $this->show('townHall', 0);
    }

    function tradeAdvisor($message_id = 0) {
        // Load the message
        $this->Player_Model->Load_Town_Messages();
        $this->load->library('pagination');
        $this->show('tradeAdvisor', $message_id);
    }

    function tradeAdvisorTradeRoute($action = '') {
        $this->show('tradeAdvisorTradeRoute', $action);
    }

    function tradegood($id = 0) {
        if ($id == 0) {
            $id = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $this->show('tradegood', $id);
    }

    function transport($island = 0, $id = 0) {
        if ($island == 0) {
            $island = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($island);
        $this->Data_Model->Load_Town($id);
        if(!isset($this->Data_Model->temp_towns_db[$id]) or $this->Data_Model->temp_towns_db[$id]->island != $this->Island_Model->island->id) {
            $this->show('error',$this->lang->line('city_not_found'));
        } else {
            $this->show('transport', $id);
        }
    }

    function version() {
        $this->show('version');
    }

    function wall() {
        if ($this->Player_Model->now_town->pos14_type != 7) {
            $this->show('error',$this->lang->line('wall_not_built'));
        } else {
            $this->show('wall', 14);
        }
    }

    function warehouse($position = 0){
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 6){
            $this->show('error',$this->lang->line('warehouse_not_built'));
        } else {
            $this->show('warehouse', $position);
        }
    }

    function winegrower($position = 0) {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 19) {
            $this->show('error',$this->lang->line('winery_not_built'));
        } else {
            $this->show('winegrower', $position);
        }
    }

    /**
     * Information about Wonders
     * @param <int> $id
     */
    function wonderDetail($id = 1) {
        $this->show('wonderDetail', $id);
    }

    /**
     * World map
     * @param <int> $x
     * @param <int> $y
     */
    function worldmap_iso($x = 0, $y = 0) {
        $id = $this->Player_Model->island_id;
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $x = ($x == 0) ? $this->Island_Model->island->x : $x ;
        $y = ($y == 0) ? $this->Island_Model->island->y : $y ;
        $this->show('worldmap_iso', $x, $y);
    }
}