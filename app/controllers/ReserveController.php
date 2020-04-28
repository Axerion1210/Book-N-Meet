<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Users;
use App\Models\Reservation;
use App\Models\Rooms;

class ReserveController extends ControllerBase
{

    public function indexAction()
    {
        $rooms = Rooms::find();
        $this->view->rooms = $rooms;
    }
    public function confirmAction()
    {
        $userid = $this->session->get('auth_id');

        $roomid = $this->request->getPost('room', 'string');
        $dates = date("Y-m-d",strtotime($this->request->getPost('reserveDate', 'string')));
        $start_time = date("H:i",strtotime($this->request->getPost('start_time', 'string')));
        $end_time = date("H:i",strtotime($this->request->getPost('end_time', 'string')));

        $conditions = ['roomid'=>$roomid];
        $room = Rooms::findFirst([
            'conditions' => 'id = :roomid:',
            'bind' => $conditions,
        ]);
        
        $interval = strtotime($end_time)-(strtotime($start_time));
        $price = $interval/3600 * ($room->hourPrice);
        
        $this->view->room = $room;

        $this->view->userid = $userid;
        $this->view->roomid = $roomid;    
        $this->view->dates = $dates;
        $this->view->start_time = $start_time;
        $this->view->end_time = $end_time;
        $this->view->price = $price;

    }
    public function createAction()
    {
        $userid = $this->request->getPost('userid','string');
        $roomid = $this->request->getPost('roomid', 'string');
        $dates = $this->request->getPost('dates', 'date');
        $start_time = $this->request->getPost('start_time', 'time');
        $end_time = $this->request->getPost('end_time', 'time');
        $price = $this->request->getPost('price','string');

        $reserve = new Reservation();

        $reserve->RoomID = $roomid;
        $reserve->reserveDate = $dates;
        $reserve->start_time = $start_time;
        $reserve->end_time = $end_time;
        $reserve->price = $price;
        $reserve->userID = $userid;
        $reserve->paid = 0;

        $success = $reserve->save();

        $this->response->redirect((($success) ? 'reserve/successcreate' : 'reserve/failedcreate'));
    }
    public function successcreateAction()
    {

    }
    public function failedcreateAction()
    {

    }
    public function historyAction()
    {
        $this->view->userid = $this->session->get('auth_id');

        $rooms = Rooms::find();
        $this->view->rooms = $rooms;

        $books = Reservation::find();
        $this->view->books = $books;
    }
    public function updateAction()
    {
        $bookid = $this->request->getPost('id','number');

        $cond1 = ['bookid'=>$bookid];
        $book = Reservation::findFirst([
                'conditions' => 'id = :bookid:',
                'bind' => $cond1,
        ]);

        $this->view->book = $book;
        $roomid = $book->RoomID;

        $cond2 = ['roomid'=>$roomid];
        $room = Rooms::findFirst(
            [
                'conditions' => 'id = :roomid:',
                'bind' => $cond2,
            ]
        );
        $rooms = Rooms::find();

        $this->view->rooms = $rooms;
        $this->view->room = $room;
    }
    public function updatingaction()
    {
        $bookid = $this->request->getPost('id','number');
        $dates = $this->request->getPost('dates','dates');
        $start_time = $this->request->getPost('start_time','time');
        $end_time = $this->request->getPost('end_time','time');

        $cond1 = ['bookid'=>$bookid];
        $book = Reservation::findFirst([
                'conditions' => 'id = :bookid:',
                'bind' => $cond1,
        ]);

        $this->view->book = $book;
        $roomid = $book->RoomID;

        $cond2 = ['roomid'=>$roomid];
        $room = Rooms::findFirst(
            [
                'conditions' => 'id = :roomid:',
                'bind' => $cond2,
            ]
        );

        $interval = strtotime($end_time)-(strtotime($start_time));
        $price = $interval/3600 * ($room->hourPrice);

        $book->reserveDate = $dates;
        $book->start_time = $start_time;
        $book->end_time = $end_time;
        $book->price = $price;

        $success = $book->save();
        $this->response->redirect((($success) ? 'reserve/successupdate' : 'reserve/failedupdate'));
    }
    public function successupdateAction()
    {
    }
    public function failedupdateAction()
    {
    }
    public function deleteAction()
    {
        $bookid = $this->request->getPost('id','number');
        $this->view->bookid = $bookid;
    }
    public function deletingAction()
    {
        $bookid = $this->request->getPost('bookid','number');
        $cond1 = ['bookid'=>$bookid];
        $book = Reservation::findFirst([
                'conditions' => 'id = :bookid:',
                'bind' => $cond1,
        ]);
        $decision = $this->request->getPost('action','string');
        if($decision == "yes"){
            if (!$book->paid)
            {
                $book->delete();
                $this->response->redirect('reserve/successdelete');
            }
            else
                $this->response->redirect('reserve/faileddelete');
        }
        else if($decision == "no")
            $this->response->redirect('reserve/history');
    }
    public function successdeleteAction()
    {
    }
    public function faileddeleteAction()
    {
    }
    public function paymentAction()
    {
        $bookid = $this->request->getPost('id','number');
        $this->view->bookid = $bookid;

        $cond1 = ['bookid'=>$bookid];
        $book = Reservation::findFirst([
                'conditions' => 'id = :bookid:',
                'bind' => $cond1,
        ]);
        $this->view->book = $book;
    }
    public function progressAction()
    {
        $bookid = $this->request->getPost('id','number');
        $this->view->bookid = $bookid;

        $cond1 = ['bookid'=>$bookid];
        $book = Reservation::findFirst([
                'conditions' => 'id = :bookid:',
                'bind' => $cond1,
        ]);

        $book->paid = 1;

        $this->response->redirect((($book->save()) ? 'reserve/successpaid' : 'reserve/failedpaid'));
    }
    public function successpaidAction()
    {
    }
    public function failedpaidAction()
    {
    }
}

