<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqModel = new Faq();
        $faqs = $faqModel->findAll();

        $this->view('faq/index', [
            'faqs' => $faqs
        ]);
    }

    public function adminIndex()
    {
        $faqModel = new Faq();
        $faqs = $faqModel->findAll();

        $this->view('faq/admin_index', [
            'faqs' => $faqs
        ]);
    }

    public function create()
    {
        $this->view('faq/create');
    }

    public function store()
    {
        $faqModel = new Faq();
        $faqModel->create([
            'question' => $_POST['question'],
            'answer' => $_POST['answer']
        ]);

        header('Location: /admin/faq');
    }

    public function edit($id)
    {
        $faqModel = new Faq();
        $faq = $faqModel->find($id);

        $this->view('faq/edit', [
            'faq' => $faq
        ]);
    }

    public function update($id)
    {
        $faqModel = new Faq();
        $faqModel->update($id, [
            'question' => $_POST['question'],
            'answer' => $_POST['answer']
        ]);

        header('Location: /admin/faq');
    }

    public function destroy($id)
    {
        $faqModel = new Faq();
        $faqModel->delete($id);

        header('Location: /admin/faq');
    }
}
