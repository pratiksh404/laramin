@if (config('laramin.include_footer',true))
<footer
    class="footer {{config('laramin.footer_classes','footer-static navbar-border')}} {{config('laramin.footer_color','footer-light')}}">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2"
                href="https://1.envato.market/pixinvent_portfolio"
                target="_blank">{{config('laramin.owner','Tech Coderz')}}</a></span><span
            class="float-md-right d-none d-lg-block">Hand-crafted &
            Made with Laravel</span></p>
</footer>
@endif