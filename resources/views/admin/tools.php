<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Manage Tools</h1>
            <button class="btn btn--yellow" id="btnNewTool">
                <i class="fa-solid fa-plus"></i>
                New Tool
            </button>
        </div>

        <div class="adminList">
            <?php getTools(); ?>
        </div>
    </main>
</div>

<!-- Modal New Tool -->
<div class="adminModal" id="modalNewTool">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>New Tool</h2>
            <button class="adminModal__card__header--close" id="btnCloseNewTool">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/tools/create" method="POST">
            <div class="adminModal__card__group">
                <label for="toolName">Name</label>
                <input type="text" id="toolName" name="name" required>
            </div>
            <div class="adminModal__card__group">
                <label for="toolDescription">Description</label>
                <textarea id="toolDescription" name="description" rows="4"></textarea>
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label>Icon</label>
                    <div class="customSelect" id="newToolIconSelect">
                        <button type="button" class="customSelect__btn">
                            Atom
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item active" data-value="atom">Atom</li>
                            <li class="customSelect__list--item" data-value="brain">Brain</li>
                            <li class="customSelect__list--item" data-value="dna">Dna</li>
                            <li class="customSelect__list--item" data-value="database">Database</li>
                            <li class="customSelect__list--item" data-value="activity">Activity</li>
                            <li class="customSelect__list--item" data-value="layers">Layers</li>
                            <li class="customSelect__list--item" data-value="microscope">Microscope</li>
                            <li class="customSelect__list--item" data-value="flask">Flask Conical</li>
                            <li class="customSelect__list--item" data-value="barchart">BarChart3</li>
                            <li class="customSelect__list--item" data-value="cpu">Cpu</li>
                        </ul>
                        <input type="hidden" name="icon" value="atom">
                    </div>
                </div>
                <div class="adminModal__card__group">
                    <label>Category</label>
                    <div class="customSelect" id="newToolCategorySelect">
                        <button type="button" class="customSelect__btn">
                            Molecular Modeling
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item active" data-value="Molecular Modeling">Molecular Modeling</li>
                            <li class="customSelect__list--item" data-value="Drug Design">Drug Design</li>
                            <li class="customSelect__list--item" data-value="Protein Prediction">Protein Prediction</li>
                            <li class="customSelect__list--item" data-value="Bioinformatics">Bioinformatics</li>
                            <li class="customSelect__list--item" data-value="Binding Affinity">Binding Affinity</li>
                        </ul>
                        <input type="hidden" name="category" value="Molecular Modeling">
                    </div>
                </div>
            </div>
            <div class="adminModal__card__group">
                <label for="toolOrder">Display Order</label>
                <input type="number" id="toolOrder" name="order" value="0" min="0">
            </div>
            <button type="submit" class="btn btn--yellow">Save Tool</button>
        </form>
    </div>
</div>

<!-- Modal Edit Tool -->
<div class="adminModal" id="modalEditTool">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2>Edit Tool</h2>
            <button class="adminModal__card__header--close" id="btnCloseEditTool">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="/admin/tools/edit" method="POST">
            <input type="hidden" name="id" id="editToolId">
            <div class="adminModal__card__group">
                <label for="editToolName">Name</label>
                <input type="text" id="editToolName" name="name" required>
            </div>
            <div class="adminModal__card__group">
                <label for="editToolDescription">Description</label>
                <textarea id="editToolDescription" name="description" rows="4"></textarea>
            </div>
            <div class="adminModal__card__row">
                <div class="adminModal__card__group">
                    <label>Icon</label>
                    <div class="customSelect" id="editToolIconSelect">
                        <button type="button" class="customSelect__btn">
                            Atom
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item" data-value="atom">Atom</li>
                            <li class="customSelect__list--item" data-value="brain">Brain</li>
                            <li class="customSelect__list--item" data-value="dna">Dna</li>
                            <li class="customSelect__list--item" data-value="database">Database</li>
                            <li class="customSelect__list--item" data-value="activity">Activity</li>
                            <li class="customSelect__list--item" data-value="layers">Layers</li>
                            <li class="customSelect__list--item" data-value="microscope">Microscope</li>
                            <li class="customSelect__list--item" data-value="flask">Flask Conical</li>
                            <li class="customSelect__list--item" data-value="barchart">BarChart3</li>
                            <li class="customSelect__list--item" data-value="cpu">Cpu</li>
                        </ul>
                        <input type="hidden" name="icon" id="editToolIconValue" value="atom">
                    </div>
                </div>
                <div class="adminModal__card__group">
                    <label>Category</label>
                    <div class="customSelect" id="editToolCategorySelect">
                        <button type="button" class="customSelect__btn">
                            Molecular Modeling
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <ul class="customSelect__list">
                            <li class="customSelect__list--item" data-value="Molecular Modeling">Molecular Modeling</li>
                            <li class="customSelect__list--item" data-value="Drug Design">Drug Design</li>
                            <li class="customSelect__list--item" data-value="Protein Prediction">Protein Prediction</li>
                            <li class="customSelect__list--item" data-value="Bioinformatics">Bioinformatics</li>
                            <li class="customSelect__list--item" data-value="Binding Affinity">Binding Affinity</li>
                        </ul>
                        <input type="hidden" name="category" id="editToolCategoryValue" value="Molecular Modeling">
                    </div>
                </div>
            </div>
            <div class="adminModal__card__group">
                <label for="editToolOrder">Display Order</label>
                <input type="number" id="editToolOrder" name="order" min="0">
            </div>
            <button type="submit" class="btn btn--yellow">Save Tool</button>
        </form>
    </div>
</div>

<script src="/js/adminTools.js"></script>