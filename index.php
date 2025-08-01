<?php

session_start();



$connection = new PDO("mysql:host=localhost;dbname=editor", 'root', '');


@$id = $_SESSION['user'];
$query = $connection->prepare("SELECT * FROM users WHERE id = '$id'");
$query->execute();
@$r = $query->fetch(PDO::FETCH_OBJ);
 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="src/lib/animate.min.css" />
    <link rel="stylesheet" href="src/lib/cropper.min.css">

    <style>
        canvas {

            position: absolute;
            width: 100PX;
            left: 260px;
            background-color: rgba(215, 132, 22, 0);

        }
    </style>
</head>

<body class="font-comicc ">





    <header class="   h-[70vh]">
        <nav class="flex  px-10  py-5 items-start justify-between bg-white">
            <div><img src="assets/Icons/promo-logo.svg" /></div>

            <?php if (isset($_SESSION['user'])) { ?>
                <div class="flex items-center gap-x-4">

                    <a href="logut.php"> <img width="30" style="padding: 5px; border-radius:5px; background-color: red;" src="assets/Icons/logout.svg" />
                    </a>
                    <span style="color:#6E2EFF;font-size:20px"><?= $r->user_name ?></span>


                </div>
            <?php } else { ?>

                <div class="flex  gap-x-4 items-center">
                    <button class="hover:bg-sky-300 hover:text-white transition-all p-2 rounded-xl "><a href="auth.php">Login</a></button>
                    <button class="rounded-full py-2  px-7 border-black text-black transition-all hover:text-sky-500 text-center border hover:border-sky-500"><a href="auth.php"></a>Sign Up</button>
                </div>
            <?php } ?>


        </nav>
        <div class=" flex justify-center">
            <div class="">
                <h1 class=" mt-[50px] text-5xl font-Minako font-light text-white">Free Photo Editor</h1>

                <?php if (isset($_SESSION['user'])) { ?>
                    <button class="flex  ml-20 mt-10 gap-x-2  px-5 py-2 text-lg text-white hover:shadow-[3px_3px_10px_3px_#fff] shadow-[3px_3px_10px_#fff] duration-300 transition-all border-white rounded-full  items-center "><img src="assets/Icons/gallery.svg" /><label for="upload1" class="cursor-pointer">Uplode
                            Image</label></button>
                <?php } else { ?>
                    <h1 style="text-align: center;margin-top:30px;background-color:#FFD1D1;border-radius:20px;padding:3px 5px ">
                    <span style="color: red; text-align:center;font-weight:bold">Login to use</span></h1>
                <?php } ?>

                <input type="file" accept=".jpg, .jpeg, .png" class="hidden" id="upload1">
                <div id="progressBar" class="hidden mt-4"></div>
            </div>
        </div>
    </header>

    <section class="flex justify-center ">

        <section class="bg-white border border-gray-200  w-[70%] absolute -bottom-[280px] rounded-2xl p-7">

            <div class="flex justify-between items-center flex-row-reverse">
                <div>
                    <button id="done" class="flex animate__animated animate__fadeInRight rounded-full text-sm gap-x-1 items-center px-3 hover:bg-sky-600 transition-all py-1.5 bg-sky-500 text-white"><img src="assets/Icons/10.svg" /><a href="#">Done</a></button>
                    <button id="apply" class=" hidden flex animate__animated animate__fadeInRight  rounded-full text-sm gap-x-1 items-center px-3 hover:bg-sky-600 transition-all py-1.5 bg-sky-500 text-white"><img src="assets/Icons/tic.svg" class="w-4 cursor-pointer" />Apply</button>
                </div>

                <div class="flex gap-x-2 items-center animate__animated animate__fadeInDown" id="zom">
                    <div id="minn"><img class="w-7 transition-all p-1 rounded-full hover:bg-sky-200 cursor-pointer   " src="assets/Icons/12.svg" alt=""></div>
                    <span id="num_z" class="text-sm text-gray-800 num_zoom">600px</span>
                    <div id="plus"><img class="w-7 transition-all p-1 rounded-full hover:bg-sky-200 cursor-pointer   " src="assets/Icons/11.svg" alt=""></div>

                </div>
                <p id="title" class="hidden animate__animated animate__fadeInDown">filters</p>



                <div class="flex items-center animate__animated animate__fadeInLeft " id="prev">
                    <div class="px-3 py-1.5  border border-gray-400 rounded-l-full "><img src="assets/Icons/arr.svg" alt=""></div>
                    <div class="px-3 py-1.5 opacity-30  border border-l-0 border-gray-400 rounded-r-full "><img src="assets/Icons/ar.svg" alt=""></div>

                </div>
                <button id="close" class=" hidden flex animate__animated animate__fadeInLeft rounded-full text-sm gap-x-1 items-center cursor-pointer border border-gray-300 px-3 hover:bg-gray-100 transition-all  py-1.5  text-gray-800"><img src="assets/Icons/close.svg" class="w-3" />Close</button>

            </div>

            <div class=" animate__animated animate__fadeInDown py-5 mt-5 flex justify-center items-center gap-x-4 " id="box_properties">

                <div id="filterr" class=" cursor-pointer py-2.5 px-[22px]  rounded-2xl shadow-[2px_2px_6px_#E6E6E6] ">
                    <img class="mx-auto w-[25px]" src="assets/Icons/1.svg" />
                    <p class="text-xs text-gray-600 mt-1.5">Filter</p>
                </div>




                <div id="crop" class=" cursor-pointer py-2.5 px-[22px]  rounded-2xl shadow-[2px_2px_6px_#E6E6E6] ">
                    <img class="mx-auto w-[25px]" src="assets/Icons/3.svg" />
                    <p class="text-xs text-gray-600 mt-1.5  ">Crop</p>
                </div>
                <div id="draw" class=" cursor-pointer py-2.5 px-[22px]  rounded-2xl shadow-[2px_2px_6px_#E6E6E6] ">
                    <img class="mx-auto w-[25px]" src="assets/Icons/4.svg" />
                    <p class="text-xs text-gray-600 mt-1.5  ">ِDraw</p>
                </div>
                <div id="addt" class=" cursor-pointer py-2.5 px-[22px]  rounded-2xl shadow-[2px_2px_6px_#E6E6E6] ">
                    <img class="mx-auto w-[25px]" src="assets/Icons/5.svg" />
                    <p class="text-xs text-gray-600 mt-1.5  ">Text</p>
                </div>
                <div id="shapess" class=" cursor-pointer py-2.5 px-[22px]  rounded-2xl shadow-[2px_2px_6px_#E6E6E6] ">
                    <img class="mx-auto w-[25px]" src="assets/Icons/6.svg" />
                    <p class="text-xs text-gray-600 mt-1.5  ">Shapes</p>
                </div>

                <div id="corner" class=" cursor-pointer py-2.5 px-[22px]  rounded-2xl shadow-[2px_2px_6px_#E6E6E6] ">
                    <img class="mx-auto w-[25px]" src="assets/Icons/9.svg" />
                    <p class="text-xs text-gray-600 mt-1.5  ">Corners</p>
                </div>


            </div>




            <div id="filter_modal" class=" animate__animated animate__fadeInDown hidden scr pb-3 *:flex-shrink-0 mt-5 mx-auto flex justify-center  items-center  w-[70%] gap-x-2 ">

                <div class="  cursor-pointer f invert_f ">
                    <img class="mx-auto o border border-gray-200 rounded w-[110px] h-[70px]" src="assets/images/2.jpg" />
                    <p class="text-sm text-center text-gray-600 mt-1">Invert</p>
                </div>

                <div class=" cursor-pointer f vibnet ">
                    <img class="mx-auto o border border-gray-200 rounded w-[110px] h-[70px]" src="assets/images/3.jpg" />
                    <p class="text-sm text-center text-gray-600 mt-1">Vibnet</p>
                </div>

                <div class=" cursor-pointer f blaW ">
                    <img class="mx-auto o border border-gray-200 rounded w-[110px] h-[70px]" src="assets/images/1.jpg" />
                    <p class="text-sm text-center text-gray-600 mt-1">Grayscale</p>
                </div>

                <div class=" cursor-pointer f efor  ">
                    <img class="mx-auto o border border-gray-200 rounded w-[110px] h-[70px]" src="assets/images/4.jpg" />
                    <p class="text-sm text-center text-gray-600 mt-1">Sharpen</p>
                </div>

                <div class=" cursor-pointer f sepi ">
                    <img class="mx-auto o border border-gray-200 rounded w-[110px] h-[70px]" src="assets/images/5.jpg" />
                    <p class="text-sm text-center text-gray-600 mt-1">Sepia</p>
                </div>

                <div class=" cursor-pointer f eto">
                    <img class="mx-auto o border border-gray-200 rounded w-[110px] h-[70px]" src="assets/images/6.jpg" />
                    <p class="text-sm text-center text-gray-600 mt-1">Palaroid</p>
                </div>

                <div class=" cursor-pointer  " id="Brightness">
                    <img class="mx-auto  rounded w-[60px]" src="assets/images/7 (1).png" />
                    <p class="text-sm text-center text-gray-600 mt-1 ">Brightness</p>
                </div>

                <div class=" cursor-pointer" id="blur">
                    <img class="mx-auto  rounded w-[60px]" src="assets/images/8.png" />
                    <p class="text-sm text-center text-gray-600 mt-1">Blur</p>
                </div>

            </div>

            <div class=" range_b animate__animated animate__fadeInDown py-4 hidden flex gap-x-5 justify-center ">
                <p class="text-sky-500 num text-xl">100%</p>
                <input id="range" type="range" class="w-[30%]" value="100" max="500" min="0" />
            </div>

            <div class=" range_bb animate__animated animate__fadeInDown py-4 hidden flex gap-x-5 justify-center ">
                <p class="text-sky-500 numm text-xl">0%</p>
                <input id="rangee" type="range" class="w-[30%]" value="0" max="100" min="0" />
            </div>

            <div class=" round animate__animated animate__fadeInDown py-4 hidden flex gap-x-5 justify-center ">
                <p class="text-sky-500 rr text-xl">0%</p>
                <input id="round_input" type="range" class="w-[30%]" value="0" max="200" min="0" />
            </div>


            <div class=" cuti range_b py-4 hidden  flex justify-center ">
                <button id="cut" class="   flex justify-center animate__animated animate__fadeInLeft rounded-full text-sm gap-x-1 items-center cursor-pointer border border-gray-300 px-3
                 hover:bg-gray-100 transition-all  py-1.5  text-gray-800">Cut</button>
            </div>



            <div class="pencile my-5 hidden animate__animated animate__fadeInDown flex justify-center gap-x-12">

                <div class="flex  flex-col ">
                    <h1 class="text-left text-sm text-gray-500">Brush Color</h1>
                    <input id="palett" class=" mt-2" type=color value="#000000">

                </div>

                <div class="relative  w-[150px]  ">
                    <h1 class="text-left mb-2 text-sm text-gray-500">Brush Size</h1>
                    <select style="appearance: none;" class="w-full focus:ring-4 ring-sky-200 text-gray-400 transition-all duration-300   outline-none py-1.5 px-3 a border border-gray-200 rounded-md" name="" id="stro">
                        <option value="1">1 px</option>
                        <option value="2">2 px</option>
                        <option value="8">8 px</option>
                        <option value="12">12 px</option>
                        <option value="16">16 px</option>
                        <option value="20">20 px</option>
                    </select>
                    <img src="assets/Icons/15.svg" class=" absolute top-[33px] right-2 " alt="">

                </div>

            </div>


            <div id="addd" class="  hidden flex animate__animated animate__fadeInDown mt-5 gap-x-10 items-center justify-center ">

                <div class="mb-5">
                    <h1 class="text-left  text-sm text-gray-500">Brush Size</h1>
                    <input id="palettt" class=" mt-2" type=color value="#000000">
                </div>

                <button onclick="addTextbox()" class=" ttt  rounded-full text-sm  
                     cursor-pointer border border-gray-300 px-3 hover:bg-gray-100 mt-2 transition-all  py-1.5  text-gray-800">AddText</button>

            </div>

            <div id="box_s" class=" my-4 hidden flex animate__animated animate__fadeInDown items-center justify-center gap-x-3">
                <div onclick="addRectangle()" class="p-3 r s rounded-2xl border border-gray-300"><img width="35" src="assets/Icons/rec.svg" alt=""></div>
                <div onclick="addFlash()" class="p-3 g s py-[18px] rounded-2xl border border-gray-300"><img width="33" src="assets/Icons/Group 1.svg" alt=""></div>
                <div onclick="addPentagon()" class="p-3 s p rounded-2xl border border-gray-300"><img width="35" src="assets/Icons/polygon.svg" alt=""></div>
                <div onclick="addCircle()" class="p-3 s c rounded-2xl border border-gray-300"><img width="35" src="assets/Icons/cir..svg" alt=""></div>

                <div onclick="addTriangle()" class="p-3 s t rounded-2xl border border-gray-300"><img width="35" src="assets/Icons/tra.svg" alt=""></div>
                <div onclick="addStar()" class="p-3 s s rounded-2xl border border-gray-300"><img width="35" src="assets/Icons/star.svg" alt=""></div>

            </div>




            <div class="flex justify-center ">
                <!--<img class="w-[80%]" src="../assets/images/d.jpg" alt="">-->
                <div id="dropArea" class="w-[100%] drag border-dotted  flex flex-col items-center justify-center  border-[5px] rounded-3xl  border-gray-300  h-[70vh]">
                    <img src="assets/Icons/55.svg" class="w-[15%] drag" alt="">
                    <p class="text-3xl mt-5 text-gray-400   drag">Drag and Drop Image</p>



                    <img src="" style="width: 600px;" class=" d " alt="" id="previewImage">


                    <div class="absolute can2">
                        <canvas id="canvass" class="    " width="1010px" height="500px"></canvas>
                    </div>
                    <div class="absolute can">
                        <canvas id="canvasss" class="    " width="1010px" height="500px"></canvas>
                    </div>

                </div>
                <!-- <div class="absolute w-[76%] h-[71%] opacity-90 bg-blue-800">f</div>-->
            </div>







        </section>



    </section>











    
    <script type="module" src="./public/js/main.js"></script>
    <script src="src/lib/progressbar.min.js"></script>
    <script src="src/lib/cropper.min.js"></script>
    <script src="src/lib/p5.js"></script>
    <script src="src/lib/fabric.min.js"></script>
    <script  src="src/public/js/propertis.js"></script>


    <script>
      
    </script>
</body>

</html>