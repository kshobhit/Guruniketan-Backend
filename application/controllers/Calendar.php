<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Calendar extends CI_Controller {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('DB_access');
    }
  /*Home page Calendar view  */
  Public function index()
  {
    $this->load->view('teacher/dashboard');
  }
  /*Get all Events */
  Public function getEvents()
  {
    $result=$this->DB_access->getEvents();
    echo json_encode($result);
  }
  /*Add new event */
  Public function addEvent()
  {
    $result=$this->DB_access->addEvent();
    echo $result;
  }
  /*Update Event */
  Public function updateEvent()
  {
    $result=$this->DB_access->updateEvent();
    echo $result;
  }
  /*Delete Event*/
  Public function deleteEvent()
  {
    $result=$this->DB_access->deleteEvent();
    echo $result;
  }
  Public function dragUpdateEvent()
  { 
    $result=$this->DB_access->dragUpdateEvent();
    echo $result;
  }
}