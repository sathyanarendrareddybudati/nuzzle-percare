<?php require_once __DIR__ . '/../layouts/main.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php require_once __DIR__ . '/../partials/admin_sidebar.php'; ?>
        </div>
        <div class="col-md-9">
            <h1>Create FAQ</h1>
            <form action="/admin/faq" method="post">
                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" class="form-control" id="question" name="question" required>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
