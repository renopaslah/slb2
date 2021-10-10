<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extracurricular extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MenuModel', 'menu');
        $this->load->model('ExtracurricularModel', 'extracurricular');
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function index()
    {
        $data = [
            'property' => [
                'template' => 'extracurricular',
                'title' => 'Ekstrakurikuler',
                'menu' => $this->menu->read(),
            ],
            'data' => $this->extracurricular->read(),
        ];

        $this->load->view('template', $data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function add()
    {
        $data = [
            'property' => [
                'template' => 'extracurricular_add',
                'title' => 'Tambah Ekstrakurikuler',
                'menu' => $this->menu->read(),
            ],
            'data' => [],
        ];

        $this->load->view('template', $data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function save()
    {
        $id = $this->input->post('id');
		if ($id) { // Edit
			$save = $this->extracurricular->save([
				'id' => $id,
				'name' => $this->input->post('name'),
			]);

			if ($save) {
				$this->session->set_flashdata('info', 'Ekstrakurikuler berhasil diubah');
			}else{
				$this->session->set_flashdata('info', 'Ekstrakurikuler gagal diubah');
			}

		}else{ // Tambah
			$save = $this->extracurricular->save([
				'name' => $this->input->post('name'),
			]);

			if ($save) {
				$this->session->set_flashdata('info', 'Ekstrakurikuler berhasil ditambah');
			}else{
				$this->session->set_flashdata('info', 'Ekstrakurikuler gagal ditambah');
			}
			
		}

		redirect('extracurricular/');
    }

	// == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function delete($id)
    {
        $save = $this->extracurricular->delete($id);

        if ($save) {
            $this->session->set_flashdata('info', 'Ekstrakurikuler berhasil dihapus');
            redirect('extracurricular/');
        }else{
			$this->session->set_flashdata('info', 'Ekstrakurikuler gagal dihapus');
            redirect('extracurricular/');
		}
    }

	// == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function edit($id)
    {
        $data = [
            'property' => [
                'template' => 'extracurricular_edit',
                'title' => 'Siswa',
                'menu' => $this->menu->read(),
            ],
            'data' => $this->extracurricular->read([], $id),
        ];

        $this->load->view('template', $data);
    }
}
