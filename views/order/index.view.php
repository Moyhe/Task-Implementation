<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
    <tr class="text-left border-b-2 border-gray-300">
        <th class="px-4 py-3">user name</th>
        <th class="px-4 py-3">user registration time</th>
        <th class="px-4 py-3">number of purchases</th>
        <th class="px-4 py-3">last purchase</th>
        <th class="px-4 py-3">activity</th>
    </tr>


    <?php foreach ($users as $user) : ?>
        <tr class="bg-gray-100 border-b border-gray-200">
            <td class="px-4 py-3"> <?= $user['name'] ?> </td>
            <td class="px-4 py-3">
                <?=
                (new DateTimeImmutable($user['created_at']))->format('Y-m-d');
                ?>

            </td>
            <td class="px-4 py-3"><?= $user['purchases'] ?></td>
            <td class="px-4 py-3">
                <?=
                (new DateTimeImmutable($user['last_purchase']))->format('Y-m-d');
                ?>
            </td>
            <td class="px-4 py-3">
                <?=
                $user['purchases'] > 5 ? "active" : "inactive";
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require base_path('views/partials/footer.php') ?>