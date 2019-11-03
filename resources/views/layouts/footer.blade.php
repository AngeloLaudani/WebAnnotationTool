<footer>
  <div class="row">
    <div class="col span-1-of-2">
      <ul class="footer-nav">
        <li>
          @if(Request::is('info'))
            <a href="#info-top">
          @else
            <a href="/info">
          @endif
            Info</a>
        </li>
        <li>
          @if(Request::is('info'))
            <a href="#contact">
          @else
            <a href="/info">
          @endif
            Contact Us</a>
        </li>
        <li><a href="http://www.unict.it/">Unict</a></li>
        <li><a href="http://www.dieei.unict.it/">DIEEI</a></li>
        <li><a href="http://perceive.dieei.unict.it/">PeRCeiVe Lab</a></li>
      </ul>
    </div>
    <div class="col span-1-of-2">
      <ul class="social-links">
        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <p> Copyright © 2017 by AnnotationTool. All right reserved. </p>
  </div>
</footer>
