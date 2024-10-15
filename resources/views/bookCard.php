<div class="container">
        <?php while ($row = $stmt->fetch()): ?>
            <div class="card">
                <div class="rating"><?= htmlspecialchars($row['rating']) ?></div>
                <img src="<?= htmlspecialchars($row['cover_image_url']) ?>" alt="Обложка книги">
                <div class="title"><?= htmlspecialchars($row['title']) ?></div>
                <div class="author">Автор: <?= htmlspecialchars($row['author']) ?></div>
                <div class="description">Описание: <?= htmlspecialchars($row['description']) ?></div>
                <div class="language">Язык: <?= htmlspecialchars($row['language']) ?></div>
                <div class="age">Возраст: <?= htmlspecialchars($row['age_recommendation']) ?>+</div>
                <div class="year">Год издания: <?= htmlspecialchars($row['publication_year']) ?></div>
            </div>
        <?php endwhile; ?>
    </div>