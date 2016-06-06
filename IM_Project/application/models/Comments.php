<?php

class Comments extends CI_Model {

    public function get_comment($lec_video_id) {

        return $this->db->select('*')
                        ->from('comments')
                        ->join('user', 'user.username = comments.user_id')
                        ->where('lec_video_id', $lec_video_id)
                        ->where('comments_status', 0)
                        ->order_by('comments_id', 'DESC')
                        ->get()->result();
    }

    public function get_reply_comment($comments_id) {

        return $this->db->select('*')
                        ->from('comments_reply')
                        ->join('user', 'user.username = comments_reply.reply_user_id')
                        ->where('commets_id', $comments_id)
                        ->where('reply_status', 0)
                        ->where('reply_reply_id', 0)
                        ->order_by('reply_com_id', 'DESC')
                        ->get()->result();
    }

    public function get_reply_reply_comment($reply_reply_id, $comments_id) {

        return $this->db->select('*')
                        ->from('comments_reply')
                        ->join('user', 'user.username = comments_reply.reply_user_id')
                        ->where('commets_id', $comments_id)
                        ->where('reply_status', 0)
                        ->where('reply_reply_id', $reply_reply_id)
                        ->order_by('reply_com_id', 'DESC')
                        ->get()->result();
    }

    public function get_announcement($article_id) {

        return $this->db->select('*')
                        ->from('announcement')
                        ->join('instructors', 'instructors.Idnum = announcement.Created_by')
                        ->where('courseID', $article_id)
                        ->where('announcement.flag', 1)
                        ->order_by('announcement.announcement_id', 'DESC')
                        ->get()->result();
    }

    public function comment_insert($insert_data) {
        $where_email = $this->session->userdata('Email');

        if ($this->input->post('update_id')) {
            $nodifys = $this->db->select('Email')->distinct()->where('course_id', $insert_data['video_id'])->where('Email !=', $where_email)->get('user_course')->result();
            if($nodifys){
                foreach ($nodifys as $key => $nodify) {
                $nodification[$key]['nodification_to'] = $nodify->Email;
                $nodification[$key]['nodification_for'] = $insert_data['video_id'];
                $nodification[$key]['nodification_content'] = 'Comment was updated';
            }
            $nod = $this->db->insert_batch('nodification', $nodification);
            }
            unset($insert_data['video_id']);
            $this->db->where('comments_id', $this->input->post('update_id'));
            $insertcomment = $this->db->update('comments', $insert_data);
        } else {

            $nodifys = $this->db->select('Email')->distinct()->where('course_id', $insert_data['video_id'])->where('Email !=', $where_email)->get('user_course')->result();
            if($nodifys){
                foreach ($nodifys as $key => $nodify) {
                $nodification[$key]['nodification_to'] = $nodify->Email;
                $nodification[$key]['nodification_for'] = $insert_data['video_id'];
                $nodification[$key]['nodification_content'] = 'New Comment';
            }
            $nod = $this->db->insert_batch('nodification', $nodification);
            }
            $insertcomment = $this->db->insert('comments', $insert_data);
        }
        if ($this->db->affected_rows()) {
            echo json_encode(array('st' => 1, 'msg' => 'Successfully Submiited'));
        } else {
            
            $this->output->enable_profiler(false);

            $this->output->set_status_header('500');
            $this->output->set_content_type('application/json');

            $errors = 'Please try again'; //function in 
            echo json_encode(array('st' => 0, 'msg' => json_encode($errors)));
        }
    }

    public function reply_comment_insert($insert_data) {
        //print_r($_POST);
        if ($this->input->post('update_id')) {
            unset($insert_data['reply_reply_id']);
            $this->db->where('reply_com_id', $this->input->post('update_id'));
            $insertcomment = $this->db->update('comments_reply', $insert_data);
        } else {
            $insertcomment = $this->db->insert('comments_reply', $insert_data);
        }
        if ($this->db->affected_rows()) {
            echo json_encode(array('st' => 1, 'msg' => 'Successfully Submiited'));
        } else {
          
            $this->output->enable_profiler(false);

            $this->output->set_status_header('500');
            $this->output->set_content_type('application/json');

            $errors = 'Please try again'; //function in 
            echo json_encode(array('st' => 0, 'msg' => json_encode($errors)));
        }
    }

    public function comment_delete() {
        $case = $this->input->post('case');

        switch ($case) {
            case 'comments':
                $comments_id = $this->input->post('article_id');
                $user_id = $this->session->userdata('username');
                $detele_data = array(
                    'comments_id' => $comments_id,
                    'user_id' => $user_id,
                );
                $detele_reply_data = array(
                    'commets_id' => $comments_id,
                    'reply_user_id' => $user_id,
                );
                $this->db->delete('comments_reply', $detele_reply_data);
                $this->db->delete('comments', $detele_data);
                break;
            case 'reply_comments':
                $comments_id = $this->input->post('article_id');
                $user_id = $this->session->userdata('username');

                $detele_reply_data = array(
                    'reply_com_id' => $comments_id,
                    'reply_user_id' => $user_id,
                );
                $this->db->delete('comments_reply', $detele_reply_data);
                break;
        }

        if ($this->db->affected_rows()) {
            echo json_encode(array('st' => 1, 'msg' => 'Successfully Submiited'));
        } else {
           
            $this->output->enable_profiler(false);

            $this->output->set_status_header('500');
            $this->output->set_content_type('application/json');

            $errors = 'Please try again'; //function in 
            echo json_encode(array('st' => 0, 'msg' => json_encode($errors)));
        }
    }

}

?>