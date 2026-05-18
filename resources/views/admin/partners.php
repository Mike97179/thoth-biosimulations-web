<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Partners</h1>
            <button class="btn btn--yellow" id="btnAddPartner">
                <i class="fa-solid fa-plus"></i>
                Add Partner
            </button>
        </div>

        <div class="adminPartnersGrid">
            <?php getPartners(); ?>
        </div>
    </main>
</div>

<!-- Modal Add Partner -->
<div class="adminModal" id="modalAddPartner">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>New Partner</h2>
            <button class="adminModal__card__header--close" id="btnCloseAddPartner">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/partners/create" method="POST">
            <div class="adminModal__card__group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="adminModal__card__group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="logo">Logo URL</label>
                <input type="text" id="logo" name="logo" placeholder="https://...">
            </div>
            <div class="adminModal__card__group">
                <label for="url">Website URL</label>
                <input type="text" id="url" name="url" placeholder="https://...">
            </div>
            <div class="adminModal__card__group">
                <label for="order">Order</label>
                <input type="number" id="order" name="order" value="0" min="0">
            </div>
            <div class="adminModal__card__buttons">
                <button type="button" class="btn btn--white" id="btnCancelAddPartner">Cancel</button>
                <button type="submit" class="btn btn--yellow">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Partner -->
<div class="adminModal" id="modalEditPartner">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Edit Partner</h2>
            <button class="adminModal__card__header--close" id="btnCloseEditPartner">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/partners/edit" method="POST">
            <input type="hidden" name="id" id="editPartnerId">
            <div class="adminModal__card__group">
                <label for="editName">Name</label>
                <input type="text" id="editName" name="name" required>
            </div>
            <div class="adminModal__card__group">
                <label for="editDescription">Description</label>
                <textarea id="editDescription" name="description" rows="4"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="editLogo">Logo URL</label>
                <input type="text" id="editLogo" name="logo" placeholder="https://...">
            </div>
            <div class="adminModal__card__group">
                <label for="editUrl">Website URL</label>
                <input type="text" id="editUrl" name="url" placeholder="https://...">
            </div>
            <div class="adminModal__card__group">
                <label for="editOrder">Order</label>
                <input type="number" id="editOrder" name="order" min="0">
            </div>
            <div class="adminModal__card__buttons">
                <button type="button" class="btn btn--white" id="btnCancelEditPartner">Cancel</button>
                <button type="submit" class="btn btn--yellow">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="/js/adminPartners.js"></script>
