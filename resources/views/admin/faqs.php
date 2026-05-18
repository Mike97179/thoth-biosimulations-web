<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>FAQs</h1>
            <button class="btn btn--yellow" id="btnAddFaq">
                <i class="fa-solid fa-plus"></i>
                Add FAQ
            </button>
        </div>

        <div class="adminList">
            <?php getFaqs(); ?>
        </div>
    </main>
</div>

<!-- Modal Add FAQ -->
<div class="adminModal" id="modalAddFaq">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>New FAQ</h2>
            <button class="adminModal__card__header--close" id="btnCloseAddFaq">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/faqs/create" method="POST">
            <div class="adminModal__card__group">
                <label for="question">Question</label>
                <input type="text" id="question" name="question" required>
            </div>
            <div class="adminModal__card__group">
                <label for="answer">Answer</label>
                <textarea id="answer" name="answer" rows="5"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="order">Order</label>
                <input type="number" id="order" name="order" value="0" min="0">
            </div>
            <div class="adminModal__card__buttons">
                <button type="button" class="btn btn--white" id="btnCancelAddFaq">Cancel</button>
                <button type="submit" class="btn btn--yellow">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit FAQ -->
<div class="adminModal" id="modalEditFaq">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Edit FAQ</h2>
            <button class="adminModal__card__header--close" id="btnCloseEditFaq">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/faqs/edit" method="POST">
            <input type="hidden" name="id" id="editFaqId">
            <div class="adminModal__card__group">
                <label for="editQuestion">Question</label>
                <input type="text" id="editQuestion" name="question" required>
            </div>
            <div class="adminModal__card__group">
                <label for="editAnswer">Answer</label>
                <textarea id="editAnswer" name="answer" rows="5"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="editOrder">Order</label>
                <input type="number" id="editOrder" name="order" min="0">
            </div>
            <div class="adminModal__card__buttons">
                <button type="button" class="btn btn--white" id="btnCancelEditFaq">Cancel</button>
                <button type="submit" class="btn btn--yellow">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="/js/adminFaqs.js"></script>
