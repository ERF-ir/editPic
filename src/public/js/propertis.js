let filter_p = document.querySelectorAll('.f');
let opa = document.querySelectorAll('.o');

let pre_img = document.getElementById('previewImage');

let filter_btn = document.getElementById('filterr')
let box_properties = document.getElementById('box_properties')
let filter_modal = document.getElementById('filter_modal')




let done_btn = document.getElementById('done')
let close_properties = document.getElementById('close')
let zom = document.getElementById('zom')
let title = document.getElementById('title')
let aply_btn = document.getElementById('apply')

let Brightness = document.getElementById('Brightness')
let blur = document.getElementById('blur')
let range_b = document.querySelector('.range_b')
let range = document.getElementById('range')

let range_bb = document.querySelector('.range_bb')
let rangee = document.getElementById('rangee')

let prev_btn = document.getElementById('prev')

let crop = document.getElementById('crop');
let cut = document.getElementById('cut');
let cuti = document.querySelector('.cuti');
let cropper = document.querySelector('.cropper-bg');
let num = document.querySelector('.num');

let numm = document.querySelector('.numm');

let draww = document.getElementById('draw')
let pencile = document.querySelector('.pencile')


let plus = document.getElementById('plus')
let num_z = document.getElementById('num_z')
let minn = document.getElementById('minn')


let stro = document.getElementById('stro')
let pallet = document.getElementById('palett')
let addt = document.getElementById('addt')

let addd = document.getElementById('addd')
let palettt = document.getElementById('palettt')
let shapess = document.getElementById('shapess')
let box_s = document.getElementById('box_s')
let s = document.querySelectorAll('.s')
let can = document.querySelectorAll('.can')
let can2 = document.querySelectorAll('.can2')
let round = document.querySelector('.round')
let round_input = document.getElementById('round_input')
let corner = document.getElementById('corner')
let rr = document.querySelector('.rr')



let filterr = '';
let save = '';
let initialWidth = 600; // عرض اولیه
let stro_w = 1
let color_p = '#000'
let color_pp = '#000'


plus.addEventListener('click', () => {
    initialWidth += 25;
    previewImage.style.width = initialWidth + 'px';
    num_z.innerHTML = initialWidth + ' px'
});

minn.addEventListener('click', () => {
    initialWidth = Math.max(0, initialWidth - 25);
    previewImage.style.width = initialWidth + 'px';
    num_z.innerHTML = initialWidth + ' px'
});









for (let i = 0; i <= filter_p.length; i++) {

    if (filter_p[i]) {

        filter_p[i].addEventListener('click', (e) => {
            e.target.classList.toggle('opacity-30')


            if (filter_p[i].classList.contains('invert_f')) {

                filterr += "invert(1)"
                pre_img.style.filter = filterr

            } else if (filter_p[i].classList.contains('vibnet')) {

                filterr += "contrast(120%) saturate(150%) brightness(90%) sepia(20%) hue-rotate(-300deg)"
                pre_img.style.filter = filterr;

            } else if (filter_p[i].classList.contains('blaW')) {

                filterr += "grayscale(1)"
                pre_img.style.filter = filterr

            } else if (filter_p[i].classList.contains('efor')) {

                filterr += "sepia(30%) contrast(120%) brightness(90%) saturate(120%) hue-rotate(270deg)"
                pre_img.style.filter = filterr

            } else if (filter_p[i].classList.contains('sepi')) {
                filterr += "sepia(1)"
                pre_img.style.filter = filterr

            } else if (filter_p[i].classList.contains('eto')) {
                filterr += "contrast(120%) saturate(150%) brightness(90%) sepia(20%) hue-rotate(-200deg)"
                pre_img.style.filter = filterr

            }



        })
    }
}


filter_btn.addEventListener('click', () => {

    box_properties.classList.add('hidden')
    filter_modal.classList.remove('hidden')

    title.classList.remove('hidden')
    close_properties.classList.remove('hidden')
    aply_btn.classList.remove('hidden')

    zom.classList.add('hidden')
    done_btn.classList.add('hidden')
    prev_btn.classList.add('hidden')


})



close_properties.addEventListener('click', () => {

    box_properties.classList.remove('hidden')
    filter_modal.classList.add('hidden')

    title.classList.add('hidden')
    close_properties.classList.add('hidden')
    aply_btn.classList.add('hidden')

    zom.classList.remove('hidden')
    done_btn.classList.remove('hidden')
    prev_btn.classList.remove('hidden')
    range_b.classList.add('hidden')
    range_bb.classList.add('hidden')

    cuti.classList.add('hidden')
    pencile.classList.add('hidden')
    addd.classList.add('hidden')
    box_s.classList.add('hidden')
    round.classList.add('hidden')









    opa.forEach((i) => {

        i.classList.remove('opacity-30')

    })
    pre_img.className = ' '
    pre_img.style.filter = save

    function setup() {
        createCanvas(0, 0); // اندازه اولیه canvas
    }
    setup()
})



aply_btn.addEventListener('click', () => {
    save = filterr

    box_properties.classList.remove('hidden')
    filter_modal.classList.add('hidden')

    title.classList.add('hidden')
    close_properties.classList.add('hidden')
    aply_btn.classList.add('hidden')

    zom.classList.remove('hidden')
    done_btn.classList.remove('hidden')
    prev_btn.classList.remove('hidden')
    range_b.classList.add('hidden')
    range_bb.classList.add('hidden')

    cuti.classList.add('hidden')
    pencile.classList.add('hidden')
    addd.classList.add('hidden')
    box_s.classList.add('hidden')
    round.classList.add('hidden')





    opa.forEach((i) => {

        i.classList.remove('opacity-30')

    })
})









Brightness.addEventListener('click', () => {

    filter_modal.classList.add('hidden')
    range_b.classList.remove('hidden')
    title.innerHTML = 'Brightness'
})

blur.addEventListener('click', () => {

    filter_modal.classList.add('hidden')
    range_bb.classList.remove('hidden')
    title.innerHTML = 'Blur'
})



range.addEventListener('input', (e) => {

    let value = e.target.value;
    pre_img.style.filter = `brightness(${value}%)`
    num.innerHTML = value + '%'
})


rangee.addEventListener('input', (e) => {

    let value = e.target.value;
    pre_img.style.filter = `blur(${value}px)`
    numm.innerHTML = value + '%'
})



crop.addEventListener('click', () => {

    box_properties.classList.add('hidden')

    title.classList.remove('hidden')
    title.innerHTML = 'Crop'

    close_properties.classList.remove('hidden')
    aply_btn.classList.remove('hidden')
    cuti.classList.remove('hidden')


    zom.classList.add('hidden')
    done_btn.classList.add('hidden')
    prev_btn.classList.add('hidden')
    can[0].classList.add('hidden')
    can2[0].classList.add('hidden')


    const cropper = new Cropper(previewImage, {
        aspectRatio: 16 / 9,
        crop(event) {
            // اطلاعات کات موجود در event
        },
    });

    // ایجاد دکمه برای کات کردن

    cuti.addEventListener('click', function () {
        // درخواست کات کردن تصویر با منطقه انتخاب شده
        cropper.getCroppedCanvas().toBlob((blob) => {
            // Blob تصویر کات شده
            const croppedImg = new Image();
            croppedImg.src = URL.createObjectURL(blob);

            // نمایش تصویر کات شده (مثلاً با اضافه کردن آن به بدنه صفحه)
            dropArea.appendChild(croppedImg);



        });
    });


})








draww.addEventListener('click', () => {


    box_properties.classList.add('hidden')

    title.classList.remove('hidden')
    title.innerHTML = 'Draw'

    close_properties.classList.remove('hidden')
    aply_btn.classList.remove('hidden')



    zom.classList.add('hidden')
    done_btn.classList.add('hidden')
    prev_btn.classList.add('hidden')
    pencile.classList.remove('hidden')

    function setup() {
        createCanvas(1010, 500); // اندازه اولیه canvas
    }
    setup()
})



stro.addEventListener('change', (e) => {

    stro_w = e.target.value
})


pallet.addEventListener('change', (e) => {

    color_p = e.target.value
})


palettt.addEventListener('change', (e) => {

    color_pp = e.target.value
})









addt.addEventListener('click', () => {


    box_properties.classList.add('hidden')

    title.classList.remove('hidden')
    title.innerHTML = 'Text'

    close_properties.classList.remove('hidden')
    aply_btn.classList.remove('hidden')



    zom.classList.add('hidden')
    done_btn.classList.add('hidden')
    prev_btn.classList.add('hidden')
    addd.classList.remove('hidden')
    can[0].classList.add('hidden')
    can2[0].classList.remove('hidden')



})




function addTextbox() {
    var canvass = new fabric.Canvas('canvass');
    var textbox = new fabric.Textbox('متن جدید', {
        left: 0,
        top: 0,
        width: 200,
        fontSize: 16,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
        fill: color_pp

    });

    canvass.add(textbox);
}





let shapes = [];

function setup() {
    createCanvas(0, 0); // اندازه اولیه canvas
}

function draw() {

    for (let i = 0; i < shapes.length; i++) {
        let currentShape = shapes[i];

        beginShape();
        noFill();
        stroke(`${color_p}`);
        strokeWeight(stro_w);

        for (let j = 0; j < currentShape.length; j++) {
            let p = currentShape[j];
            curveVertex(p.x, p.y);
        }

        endShape();
    }
}

function mousePressed() {
    shapes.push([]); // ایجاد یک شیء جدید برای ذخیره نقاط شکل جدید
}

function mouseDragged() {
    let currentShape = shapes[shapes.length - 1];
    let point = createVector(mouseX, mouseY);
    currentShape.push(point);
}









shapess.addEventListener('click', () => {

    can[0].classList.remove('hidden')

    box_properties.classList.add('hidden')

    title.classList.remove('hidden')
    title.innerHTML = 'Shapes'

    close_properties.classList.remove('hidden')
    aply_btn.classList.remove('hidden')



    zom.classList.add('hidden')
    done_btn.classList.add('hidden')
    prev_btn.classList.add('hidden')
    box_s.classList.remove('hidden')





})






s.forEach((elem) => {

    elem.addEventListener('click', () => {

        if (elem.classList.contains('r')) {

            console.log('ok');

        } else if (elem.classList.contains('g')) {

            console.log('g');


        } else if (elem.classList.contains('p')) {

            console.log('p');


        } else if (elem.classList.contains('c')) {

            console.log('c');


        } else if (elem.classList.contains('t')) {

            console.log('t');

        } else if (elem.classList.contains('s')) {
            console.log('s');

        }

    })

})









var canvass = new fabric.Canvas('canvasss');

function addCircle() {
    //var shapeColor = document.getElementById('shapeColor').value;

    var circle = new fabric.Circle({
        radius: 50,
        //fill: shapeColor,
        left: 100,
        top: 100,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
    });

    canvass.add(circle);
}


function addTriangle() {
    //var shapeColor = document.getElementById('shapeColor').value;

    var triangle = new fabric.Triangle({
        width: 100,
        height: 100,
        //fill: shapeColor,
        left: 200,
        top: 200,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
    });

    canvass.add(triangle);
}





function addStar() {
    // var shapeColor = document.getElementById('shapeColor').value;

    var star = new fabric.Polygon([{
        x: 0,
        y: 0
    },
    {
        x: 20,
        y: 40
    },
    {
        x: 40,
        y: 0
    },
    {
        x: 0,
        y: 30
    },
    {
        x: 40,
        y: 30
    },
    ], {
        left: 300,
        top: 100,
        //fill: shapeColor,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
    });

    canvass.add(star);
}




function addPentagon() {
    //var shapeColor = document.getElementById('shapeColor').value;

    var pentagon = new fabric.Polygon([{
        x: 50,
        y: 0
    },
    {
        x: 100,
        y: 40
    },
    {
        x: 80,
        y: 100
    },
    {
        x: 20,
        y: 100
    },
    {
        x: 0,
        y: 40
    },
    ], {
        left: 400,
        top: 200,
        //fill: shapeColor,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
    });

    canvass.add(pentagon);
}



function addRectangle() {
    //var shapeColor = document.getElementById('shapeColor').value;

    var rectangle = new fabric.Rect({
        width: 100,
        height: 60,
        //fill: shapeColor,
        left: 150,
        top: 300,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
    });

    canvass.add(rectangle);
}









function addFlash() {
    //var shapeColor = document.getElementById('shapeColor').value;

    var flash = new fabric.Polygon([{
        x: 0,
        y: 0
    },
    {
        x: 20,
        y: 0
    },
    {
        x: 30,
        y: 20
    },
    {
        x: 20,
        y: 40
    },
    {
        x: 0,
        y: 40
    },
    ], {
        left: 500,
        top: 100,
        //fill: shapeColor,
        borderColor: 'blue',
        cornerColor: 'green',
        cornerSize: 10,
        transparentCorners: false,
    });

    canvass.add(flash);
}






corner.addEventListener('click', () => {
    box_properties.classList.add('hidden')

    title.classList.remove('hidden')
    title.innerHTML = 'Corners'

    close_properties.classList.remove('hidden')
    aply_btn.classList.remove('hidden')



    zom.classList.add('hidden')
    done_btn.classList.add('hidden')
    prev_btn.classList.add('hidden')
    round.classList.remove('hidden')



})


round_input.addEventListener('input', (e) => {

    let val = e.target.value

    previewImage.style.borderRadius = `${val}px`;
    rr.innerHTML = `${val}%`

})
