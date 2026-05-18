<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Manage Careers</h1>
            <button class="btn btn--yellow" id="btnNewPosition">
                <i class="fa-solid fa-plus"></i>
                New Position
            </button>
        </div>

        <div class="adminList">
            <?php getCareers(); ?>
        </div>
    </main>
</div>

<!-- Modal New Position -->
<div class="adminModal" id="modalNewPosition">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>New Position</h2>
            <button class="adminModal__card__header--close" id="btnCloseNewPosition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/careers/create" method="POST">
            <div class="adminModal__card__group">
                <label for="positionTitle">Title</label>
                <input type="text" id="positionTitle" name="title" required>
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label>Department</label>
                    <div class="customSelect" id="newDepartmentSelect">
                        <button type="button" class="customSelect__btn">
                            AI Research
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item active" data-value="AI Research">AI Research</li>
                            <li class="customSelect__list--item" data-value="Computational Chemistry">Computational Chemistry</li>
                            <li class="customSelect__list--item" data-value="Bioinformatics">Bioinformatics</li>
                            <li class="customSelect__list--item" data-value="Drug Discovery">Drug Discovery</li>
                            <li class="customSelect__list--item" data-value="Engineering">Engineering</li>
                            <li class="customSelect__list--item" data-value="Operations">Operations</li>
                        </ul>
                        <input type="hidden" name="department" value="AI Research">
                    </div>
                </div>
                <div class="adminModal__card__group">
                    <label>Type</label>
                    <div class="customSelect" id="newTypeSelect">
                        <button type="button" class="customSelect__btn">
                            Full-time
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item active" data-value="Full-time">Full-time</li>
                            <li class="customSelect__list--item" data-value="Part-time">Part-time</li>
                            <li class="customSelect__list--item" data-value="Contract">Contract</li>
                            <li class="customSelect__list--item" data-value="Internship">Internship</li>
                        </ul>
                        <input type="hidden" name="type" value="Full-time">
                    </div>
                </div>
            </div>
            <div class="adminModal__card__group">
                <label for="positionLocation">Location</label>
                <input type="text" id="positionLocation" name="location" placeholder="e.g. Remote / San Francisco">
            </div>
            <div class="adminModal__card__group">
                <label for="positionDescription">Description</label>
                <textarea id="positionDescription" name="description" rows="4"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="positionRequirements">Requirements</label>
                <textarea id="positionRequirements" name="requirements" rows="4"></textarea>
            </div>
            <div class="adminModal__card__toggle">
                <input type="checkbox" id="positionActive" name="active" value="1" checked>
                <label for="positionActive" class="adminModal__card__toggle--switch"></label>
                <span>Active</span>
            </div>
            <button type="submit" class="btn btn--yellow">Save Position</button>
        </form>
    </div>
</div>

<!-- Modal Edit Position -->
<div class="adminModal" id="modalEditPosition">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Edit Position</h2>
            <button class="adminModal__card__header--close" id="btnCloseEditPosition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/careers/edit" method="POST">
            <input type="hidden" name="id" id="editPositionId">
            <div class="adminModal__card__group">
                <label for="editPositionTitle">Title</label>
                <input type="text" id="editPositionTitle" name="title" required>
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label>Department</label>
                    <div class="customSelect" id="editDepartmentSelect">
                        <button type="button" class="customSelect__btn">
                            AI Research
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item" data-value="AI Research">AI Research</li>
                            <li class="customSelect__list--item" data-value="Computational Chemistry">Computational Chemistry</li>
                            <li class="customSelect__list--item" data-value="Bioinformatics">Bioinformatics</li>
                            <li class="customSelect__list--item" data-value="Drug Discovery">Drug Discovery</li>
                            <li class="customSelect__list--item" data-value="Engineering">Engineering</li>
                            <li class="customSelect__list--item" data-value="Operations">Operations</li>
                        </ul>
                        <input type="hidden" name="department" id="editDepartmentValue" value="AI Research">
                    </div>
                </div>
                <div class="adminModal__card__group">
                    <label>Type</label>
                    <div class="customSelect" id="editTypeSelect">
                        <button type="button" class="customSelect__btn">
                            Full-time
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item" data-value="Full-time">Full-time</li>
                            <li class="customSelect__list--item" data-value="Part-time">Part-time</li>
                            <li class="customSelect__list--item" data-value="Contract">Contract</li>
                            <li class="customSelect__list--item" data-value="Internship">Internship</li>
                        </ul>
                        <input type="hidden" name="type" id="editTypeValue" value="Full-time">
                    </div>
                </div>
            </div>
            <div class="adminModal__card__group">
                <label for="editPositionLocation">Location</label>
                <input type="text" id="editPositionLocation" name="location" placeholder="e.g. Remote / San Francisco">
            </div>
            <div class="adminModal__card__group">
                <label for="editPositionDescription">Description</label>
                <textarea id="editPositionDescription" name="description" rows="4"></textarea>
            </div>
            <div class="adminModal__card__group">
                <label for="editPositionRequirements">Requirements</label>
                <textarea id="editPositionRequirements" name="requirements" rows="4"></textarea>
            </div>
            <div class="adminModal__card__toggle">
                <input type="checkbox" id="editPositionActive" name="active" value="1">
                <label for="editPositionActive" class="adminModal__card__toggle--switch"></label>
                <span>Active</span>
            </div>
            <button type="submit" class="btn btn--yellow">Save Position</button>
        </form>
    </div>
</div>

<script src="/js/adminCareers.js"></script>