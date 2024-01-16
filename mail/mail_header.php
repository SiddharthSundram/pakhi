
<div class="flex-1 py-6 px-10 shadow-lg flex justify-between bg-white ">
    <div class="flex-1">
        <a href="index.php" class=" font-serif px-3 py-2 rounded  text-5xl text-blue-800 "><b class="text-blue-800">Pakhi</b>mail</a>
    </div>

    <div class="flex flex-1 justify-end items-center gap-3">
        <a href="setting.php" class=" flex items-center gap-3">
            <?php if($getUserData['dp']): ?>
                <img src="../images/?= $getUserData['dp']; ?>"    alt="Sender" class="w-10 h-10 rounded-full ">
            <?php else: ?>
                <img src="../images/dp.png" alt="Sender" class="w-10 h-10 rounded-full ">
            <?php endif;  ?>
            <span class="text-slate-500 font-bold capitalize hover:text-slate-700"><?= $getUserData['fname']; ?></span>
            </a>
        <a href="../logout.php" class="text-red-500 hover:text-red-900 font-bold py-2 rounded">Sign Out</a>
    </div>
</div>