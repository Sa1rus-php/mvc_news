<?php

namespace application\models;

use application\core\Model;


class Admin extends Model {

	public $error;
    public function checkData($login, $password) {
        $params = [
            'login' => $login,
        ];
        $hash = $this->db->column('SELECT password FROM users WHERE login = :login', $params);
        $status = $this->db->column('SELECT status FROM users WHERE login = :login', $params);
        if ($hash == md5(md5($_POST['password'])) and  $status == 'admin') {
            return true;
        } else{
            return false;
        }
    }
    public function login($login) {
        $params = [
            'login' => $login,
        ];
        $data = $this->db->row('SELECT * FROM users WHERE login = :login', $params);
        $_SESSION['admin'] = $data[0];
    }


	public function postValidate($type) {
		$nameLen = iconv_strlen($_POST['name']);
		$descriptionLen = iconv_strlen($_POST['description']);
		$textLen = iconv_strlen($_POST['text']);
		if ($nameLen < 3 or $nameLen > 40) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 50) {
			$this->error = 'Описание должно содержать от 3 до 100 символов';
			return false;
		} elseif ($textLen < 5 or $textLen > 150) {
			$this->error = 'Текст должнен содержать от 10 до 150 символов';
			return false;
		}
		return true;
	}

    public function postAdd() {
        $params = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'text' => $_POST['text'],
            'date' => date('l jS \of F Y h:i:s A'),
        ];
        $this->db->query("INSERT INTO `posts` (`name`, `description`, `text`, `date`) VALUES (:name, :description, :text,:date)", $params);
        return $this->db->lastInsertId();
    }

	public function postEdit($post, $id) {
		$params = [
			'id' => $id,
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'text' => $_POST['text'],
		];
		$this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE id = :id', $params);
	}
    public function usersEdit($post, $id) {
        $params = [
            'id' => $id,
            'login' => $_POST['login'],
            'status' => $_POST['status']
        ];
        $this->db->query('UPDATE users SET status= :status,login = :login WHERE id = :id', $params);
    }

	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
	}

	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM posts WHERE id = :id', $params);
	}
    public function usersDelete($id) {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM users WHERE id = :id', $params);
    }

	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}
    public function usersData($id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM users WHERE id = :id', $params);
    }

    public function admins(){

    }
    public function isUsersExists($id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM users WHERE id = :id', $params);
    }

}