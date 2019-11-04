<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends BD_Controller {

    function __construct()
    {
        parent::__construct();
        $this->auth();
        $this->load->model('activities_model');
    }

    function search_post(){
        
        $columns = array( 
            0 => null,
            1 => 'activity_name', 
            2 => 'start_date',
            3 => 'end_date'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->activities_model->all_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('keyword'))){            
            $posts = $this->activities_model->all($limit,$start,$order,$dir);
        } else {
            $keyword = $this->post('keyword'); 
            $posts =  $this->activities_model->search($limit,$start,$keyword,$order,$dir);
            $totalFiltered = $this->activities_model->search_count($keyword);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['activity_id'] = $post->activity_id;
                $nestedData['activity_name'] = $post->activity_name;
                $nestedData['start_date'] = $post->start_date;
                $nestedData['end_date'] = $post->end_date;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );

        $this->response($json_data, REST_Controller::HTTP_OK);
    }

    function create_post(){
        $activity_name = $this->post('activity_name');
        $start_date = $this->post('start_date');
        $end_date = $this->post('end_date');

        $data = array(
            "activity_name" => $activity_name,
            "start_date" => $start_date,
            "end_date" => $end_date
        );

        $result = $this->activities_model->insert($data);

        $this->response([
            'status' => $result
        ], REST_Controller::HTTP_OK);
        
    }

    function delete_get(){
        $id = $this->get('id');
        $result = $this->activities_model->delete(array('activity_id' => $id));
        $this->response([
            'status' => $result
        ], REST_Controller::HTTP_OK);
        
    }

}