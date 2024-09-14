import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

function buy(){
    Swal.fire({
        title: "ثبت پیام",
        text: "پیغام شما با موفقیت ثبت شد",
        icon: "success"
    });
}


const Open=document.getElementById('open')
const Close=document.getElementById('close')
const Aside=document.getElementById('menu-aside')
const Search=document.getElementById('search')
const Box=document.getElementById('box-search')
const CloseSearch=document.getElementById('close-search')

Open.addEventListener('click', function(){
    Aside.classList.add('show-menu-aside')
})

Close.addEventListener('click', function(){
    Aside.classList.remove('show-menu-aside')
})

Search.addEventListener('click', function(){
    Box.classList.add('box-show')
})

CloseSearch.addEventListener('click', function(){
    Box.classList.remove('box-show')
})





