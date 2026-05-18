<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Manage Team</h1>
            <button class="btn btn--yellow" id="btnAddMember">
                <i class="fa-solid fa-plus"></i>
                Add Member
            </button>
        </div>

        <div class="adminList">
            <?php getTeam(); ?>
        </div>
    </main>
</div>

<!-- Modal Add Member -->
<div class="adminModal" id="modalAddMember">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Add Member</h2>
            <button class="adminModal__card__header--close" id="btnCloseAddModal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/team/create" method="POST" enctype="multipart/form-data">
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="adminModal__card__group">
                    <label for="role">Role / Title</label>
                    <input type="text" id="role" name="role" required>
                </div>
            </div>
            <div class="adminModal__card__group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" rows="4"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label>Photo</label>
                <label for="photo" class="adminModal__card__file">
                    <i class="fa-regular fa-image"></i>
                    <span>Choose File</span>
                    <input type="file" id="photo" name="photo" accept="image/*">
                </label>
            </div>
            <div class="adminModal__card__group">
                <label for="linkedin">LinkedIn URL</label>
                <input type="text" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/...">
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__toggle">
                    <input type="checkbox" id="founder" name="founder" value="1">
                    <label for="founder" class="adminModal__card__toggle--switch"></label>
                    <span>Founder</span>
                </div>
                <div class="adminModal__card__group">
                    <label for="order">Display Order</label>
                    <input type="number" id="order" name="order" value="0" min="0">
                </div>
            </div>
            <button type="submit" class="btn btn--yellow">Save Member</button>
        </form>
    </div>
</div>

<!-- Modal Edit Member -->
<div class="adminModal" id="modalEditMember">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Edit Member</h2>
            <button class="adminModal__card__header--close" id="btnCloseEditMemberModal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/team/edit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="editMemberId">
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label for="editName">Name</label>
                    <input type="text" id="editName" name="name" required>
                </div>
                <div class="adminModal__card__group">
                    <label for="editRole">Role / Title</label>
                    <input type="text" id="editRole" name="role" required>
                </div>
            </div>
            <div class="adminModal__card__group">
                <label for="editBio">Bio</label>
                <textarea id="editBio" name="bio" rows="4"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label>Photo</label>
                <label for="editPhoto" class="adminModal__card__file">
                    <i class="fa-regular fa-image"></i>
                    <span>Choose File</span>
                    <input type="file" id="editPhoto" name="photo" accept="image/*">
                </label>
            </div>
            <div class="adminModal__card__group">
                <label for="editLinkedin">LinkedIn URL</label>
                <input type="text" id="editLinkedin" name="linkedin" placeholder="https://linkedin.com/in/...">
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__toggle">
                    <input type="checkbox" id="editFounder" name="founder" value="1">
                    <label for="editFounder" class="adminModal__card__toggle--switch"></label>
                    <span>Founder</span>
                </div>
                <div class="adminModal__card__group">
                    <label for="editOrder">Display Order</label>
                    <input type="number" id="editOrder" name="order" min="0">
                </div>
            </div>
            <button type="submit" class="btn btn--yellow">Save Member</button>
        </form>
    </div>
</div>

<script src="/js/adminTeam.js"></script>