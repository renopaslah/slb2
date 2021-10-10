<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MenuModel', 'menu');
        $this->load->model('StudentModel', 'student');
        $this->load->model('ProfileModel', 'profile');
        $this->load->model('UserModel', 'user');
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function index()
    {
        $data = [
            'property' => [
                'template' => 'student',
                'title' => 'Siswa',
                'menu' => $this->menu->read(),
            ],
            'data' => $this->student->read(),
        ];

        $this->load->view('template', $data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function add()
    {
        $data = [
            'property' => [
                'template' => 'student_add',
                'title' => 'Tambah Siswa',
                'menu' => $this->menu->read(),
            ],
            'data' => [],
        ];

        $this->load->view('template', $data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function set_user($id)
    {
        $data = [
            'property' => [
                'template' => 'student_set_user',
                'title' => 'Siswa',
                'menu' => $this->menu->read(),
            ],
            'data' => $this->student->read([], $id),
        ];

        $this->load->view('template', $data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function delete($id)
    {
        $save = $this->student->delete($id);

        if ($save) {
            $this->session->set_flashdata('info', 'Siswa berhasil dihapus');
            redirect('student/');
        }else{
			$this->session->set_flashdata('info', 'Siswa gagal dihapus');
            redirect('student/');
		}
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function edit($id)
    {
        $data = [
            'property' => [
                'template' => 'student_edit',
                'title' => 'Siswa',
                'menu' => $this->menu->read(),
            ],
            'data' => $this->student->read([], $id),
        ];

        $this->load->view('template', $data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function save()
    {
        $id = $this->input->post('id');
        if ($id) { // Edit
            $student = $this->student->read([], $id);
            $data = [
                'id' => $student['profile_id'],
                'name' => $this->input->post('name'),
                'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth'))),
                'address' => $this->input->post('address'),
            ];
            $save = $this->profile->save($data);

            $data = [
                'id' => $id,
                'nisn' => $this->input->post('nisn'),
            ];
            $save = $this->student->save($data);

            if ($save) {
                $this->session->set_flashdata('info', 'Siswa berhasil diubah');
                redirect('student/');
            }
        } else { // save
            $data = [
                'name' => $this->input->post('name'),
                'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth'))),
                'address' => $this->input->post('address'),
            ];
            $save = $this->profile->save($data);

            $data = [
                'profile_id' => $this->db->insert_id(),
                'nisn' => $this->input->post('nisn'),
            ];
            $save = $this->student->save($data);

            if ($save) {
                $this->session->set_flashdata('info', 'Siswa berhasil ditambah');
                redirect('student/');
            }else{
                $this->session->set_flashdata('info', 'Siswa gagal ditambah');
                redirect('student/');
            }
        }
    }
    
    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function save_user()
    {
        // student
		$student = $this->student->read([], $this->input->post('id'));

        // user
        $user = $this->user->read([], $student['profile_id']);

        if ($student) {
            
            if (count($user) > 0) {
				$data = [
					'id' => $user['id'],
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				];	
				
				$save = $this->user->save($data);
            } else {
				$data = [
					'profile_id' => $this->input->post('id'),
					'level_id' => 2,
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				];	
				
				$save = $this->user->save($data);
            }

			if($save){
				$this->session->set_flashdata('info', 'User siswa sudah diaktifkan');
			}else{
				$this->session->set_flashdata('info', 'User siswa gagal diaktifkan');
			}

			redirect('student/');	
        } else {
            $this->session->set_flashdata('info', 'Data profil tidak tersedia');
            redirect('student/');
        }
    }
}
