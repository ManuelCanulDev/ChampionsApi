<?php
/*
Generated by Manuigniter v2.0
www.manuigniter.com
 */

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class runes extends REST_Controller
{
    private $code01 = '001'; //CODIGO CORRECTO.
    private $code02 = '002'; //VALOR NO ENCONTRADO.
    private $code03 = '003'; //FALTAN PARAMETROS.
    private $code04 = '004'; //CODIGO NO CORRECTO.

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Runes_model');
        $this->load->helper('text');
    }

    public function get_all_get()
    {
        $runes = $this->Runes_model->get_all_runes();

        if (count($runes) > 0) {

            $data = array();

            foreach ($runes as $rune) {

                array_push($data, array(
                    'id' => $rune['id'],
                    'name' => $rune['name'],
                    'description' => $rune['description'],
                    'image' => 'runes/'.$rune['id'].'.png'
                ));
            }

            $this->response([
                'status' => true,
                'error' => false,
                'message' => "OK",
                'system_code' => $this->code01,
                'data' => $data
            ], 200);

        } else {
            $this->response([
                'status' => false,
                'error' => true,
                'message' => 'ERROR',
                'system_code' => $this->code02,
            ], 200);
        }
    }
}