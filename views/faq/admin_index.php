
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php require_once __DIR__ . '/../partials/admin_sidebar.php'; ?>
        </div>
        <div class="col-md-9">
            <h1>Manage FAQs</h1>
            <a href="/admin/faq/create" class="btn btn-primary mb-3">Create FAQ</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($faqs as $faq) : ?>
                        <tr>
                            <td><?= $faq['id'] ?></td>
                            <td><?= htmlspecialchars($faq['question']) ?></td>
                            <td><?= htmlspecialchars($faq['answer']) ?></td>
                            <td>
                                <a href="/admin/faq/edit/<?= $faq['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/admin/faq/delete/<?= $faq['id'] ?>" method="post" style="display: inline-block;">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
