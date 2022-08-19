<div class="form-head d-flex mb-0 mb-lg-4 align-items-start">
    <div class="mr-auto d-none d-lg-block">
        <h2 class="text-black font-w600">O'quv guruhlari</h2>
        <p class="mb-0">Sizning barcha o'quv guruhlaringiz ro'yhati</p>
    </div>
    <div class="d-none d-lg-flex align-items-center">
        <div class="text-right">
            <h3 class="fs-20 text-black mb-0">09:62 AM</h3>
            <span class="fs-14">Monday, 3 Augusut 2020</span>
        </div>
    </div>
</div>

<div class="campaign-audio col-md-12">
    <?php foreach ($groups as $group): ?>
<div class="compaign-row align-items-center p-sm-4 p-3 row sp16 mx-0 mb-2">
    <div class="my-2 col-xl-4 col-xxl-6 col-lg-6 col-md-8 col-sm-12">
        <div class="media align-items-center">

            <div class="media-body">
                <p class="text-primary mb-1">#Umidbek Jumaniyozov</p>
                <h3 class="fs-20"><a class="text-black" href="analytics.html"><?= $group->name ?></a></h3>
                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 2L5 12.01L2 9.01" stroke="#737373" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="fs-14 ml-1">Published on 5 March 2020</span>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-8 col-lg-8 col-md-8 col-sm-8 px-3">
        <div class="row align-items-center my-2">
            <div class="col-4">
                <h3 class="fs-20 text-black">$63.04</h3>
                <span class="fs-14">O'quvchilar soni</span>
            </div>
            <div class="col-4">
                <h3 class="fs-20 text-black">$652.86</h3>
                <span class="fs-14">Boshlanish vaqti</span>
            </div>
            <div class="col-4">
                <h3 class="fs-20 text-black">$652.86</h3>
                <span class="fs-14">Dars kunlari</span>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-xxl-8 col-lg-8 col-md-6 text-left text-md-right my-2">
        <a href="javascript:void(0);" class="btn bgl-primary text-primary cl-btn ">Aktiv</a>

    </div>
</div>
    <?php endforeach;?>
</div>