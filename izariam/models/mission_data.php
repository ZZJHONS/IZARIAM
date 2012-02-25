<?
/*
 * Project: iZariam
 * Edited: 12/02/2012
 * By: ZZJHONS
 * Info: zzjhons@gmail.com
 */
// For now, take cargo ship data, and then will take the data from all ships
$cost = $this->CI->Data_Model->army_cost_by_type(23, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
// Write the coordinates
$x1 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->from]->island]->x;
$x2 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->to]->island]->x;
$y1 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->from]->island]->y;
$y2 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->to]->island]->y;
// Время пути из одного конца в другой
$time = $this->CI->Data_Model->time_by_coords($x1,$x2,$y1,$y2,$cost['speed']);
// Travel time from one end to the other
$mission_elapsed = time() - $mission->mission_start;
// It remains until the end of the mission
$mission_end = $time - $mission_elapsed;
// If the load was in the beginning then it should be in the end of the road
$loading_time = 0;
// Get the city
$trade_town = $this->Data_Model->temp_towns_db[$mission->to];
$from_town = $this->Data_Model->temp_towns_db[$mission->from];
if($mission->loading_from_start == $mission->mission_start)
{
    // The level of the port of the city
    $port_position = $this->Data_Model->get_position(2, $trade_town);
    if($port_position == 1 or $port_position == 2)
    {
        $level_text = 'pos'.$port_position.'_level';
        $port_level = $trade_town->$level_text;
    }
    else
    {
        $port_level = 0;
    }
   // Find the download speed in a foreign port
   $port_speed = $this->Data_Model->speed_by_port_level($port_level);
   // Duration of load
   $loading_time = ($all_resources/($port_speed / 60));
}
else
{
    // The level of the port of the city
    $port_position = $this->Data_Model->get_position(2, $from_town);
    if($port_position == 1 or $port_position == 2)
    {
        $level_text = 'pos'.$port_position.'_level';
        $port_level = $from_town->$level_text;
    }
    else
    {
        $port_level = 0;
    }
   // Find the download speed in a foreign port
   $port_speed = $this->Data_Model->speed_by_port_level($port_level);
   // Длительность загрузки
   $loading_time = ($all_resources/($port_speed / 60));
}
// It remains until the end of loading
$loading_end = $mission_end + $loading_time;
// It remains to return
// $return_end = ($mission->return_start-$mission->mission_start)*$mission->percent;
// If we return
$return_end = 2147483647;
if ($mission->return_start > 0)
{
    if ($mission->percent == 0) { $mission->percent = 1; }
    // return time
    $return = $time * $mission->percent;
    $return_elapsed = time() - $mission->return_start;
    // It remains to return
    $return_end = ($return - $return_elapsed >= 0) ? $return - $return_elapsed : 0;
}