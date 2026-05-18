<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Manage News</h1>
            <button class="btn btn--yellow" id="btnNewPost">
                <i class="fa-solid fa-plus"></i>
                New Post
            </button>
        </div>

        <div class="adminList">
            <?php getNews(); ?>
        </div>
    </main>
</div>

<!-- Modal New Post -->
<div class="adminModal" id="modalNewPost">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>New Post</h2>
            <button class="adminModal__card__header--close" id="btnCloseModal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/news/create" method="POST" enctype="multipart/form-data">
            <div class="adminModal__card__group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="adminModal__card__group">
                <label for="summary">Summary</label>
                <textarea id="summary" name="summary" rows="3"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="content">Content (Markdown)</label>
                <textarea id="content" name="content" rows="6"></textarea>
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label>Category</label>
                    <div class="customSelect">
                        <button type="button" class="customSelect__btn">
                            Announcement
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item active" data-value="Announcement">Announcement</li>
                            <li class="customSelect__list--item" data-value="Collaboration">Collaboration</li>
                            <li class="customSelect__list--item" data-value="Research">Research</li>
                            <li class="customSelect__list--item" data-value="Conference">Conference</li>
                            <li class="customSelect__list--item" data-value="Publication">Publication</li>
                        </ul>
                        <input type="hidden" name="category_id" value="Announcement">
                    </div>
                </div>
                <div class="adminModal__card__group">
                    <label for="created_at">Publish Date</label>
                    <input type="date" id="created_at" name="created_at">
                </div>
            </div>
            <div class="adminModal__card__group">
                <label>Featured Image</label>
                <label for="image" class="adminModal__card__file">
                    <i class="fa-regular fa-image"></i>
                    <span>Choose File</span>
                    <input type="file" id="image" name="image" accept="image/*">
                </label>
            </div>
            <div class="adminModal__card__toggle">
                <input type="checkbox" id="published" name="published" value="1">
                <label for="published" class="adminModal__card__toggle--switch"></label>
                <span>Published</span>
            </div>
            <button type="submit" class="btn btn--yellow">Save Post</button>
        </form>
    </div>
</div>

<!-- Modal Edit Post -->
<div class="adminModal" id="modalEditPost">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Edit Post</h2>
            <button class="adminModal__card__header--close" id="btnCloseEditModal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/news/edit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="editId">
            <div class="adminModal__card__group">
                <label for="editTitle">Title</label>
                <input type="text" id="editTitle" name="title" required>
            </div>
            <div class="adminModal__card__group">
                <label for="editSummary">Summary</label>
                <textarea id="editSummary" name="summary" rows="3"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="editContent">Content (Markdown)</label>
                <textarea id="editContent" name="content" rows="6"></textarea>
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label>Category</label>
                    <div class="customSelect" id="editCategorySelect">
                        <button type="button" class="customSelect__btn">
                            Announcement
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item" data-value="Announcement">Announcement</li>
                            <li class="customSelect__list--item" data-value="Collaboration">Collaboration</li>
                            <li class="customSelect__list--item" data-value="Research">Research</li>
                            <li class="customSelect__list--item" data-value="Conference">Conference</li>
                            <li class="customSelect__list--item" data-value="Publication">Publication</li>
                        </ul>
                        <input type="hidden" name="category_id" id="editCategoryId" value="Announcement">
                    </div>
                </div>
                <div class="adminModal__card__group">
                    <label for="editDate">Publish Date</label>
                    <input type="date" id="editDate" name="created_at">
                </div>
            </div>
            <div class="adminModal__card__group">
                <label>Featured Image</label>
                <label for="editImage" class="adminModal__card__file">
                    <i class="fa-regular fa-image"></i>
                    <span>Choose File</span>
                    <input type="file" id="editImage" name="image" accept="image/*">
                </label>
            </div>
            <div class="adminModal__card__toggle">
                <input type="checkbox" id="editPublished" name="published" value="1">
                <label for="editPublished" class="adminModal__card__toggle--switch"></label>
                <span>Published</span>
            </div>
            <button type="submit" class="btn btn--yellow">Save Post</button>
        </form>
    </div>
</div>

<script src="/js/adminNews.js"></script>