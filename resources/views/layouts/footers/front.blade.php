<footer class="footer text-center">
    <div class="container text-center">
      <div class="row align-items-center justify-content-md-between text-center">
        <div class="col-md-6 col-sm-12 col-xs-12 text-center">
          <div class="copyright text-center">
            &copy; 2020 <a href="" target="_blank">{{ config('global.site_name', 'mResto') }}</a>.
          </div>
        </div>
        <div class="col-md-6 text-center">
          <ul id="footer-pages" class="nav nav-footer  text-center">
            <li v-for="page in pages" class="nav-item text-center" v-cloak>
                <a :href="'/pages/' + page.id" class="nav-link ">@{{ page.title }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
