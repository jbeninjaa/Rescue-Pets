<?php $this->view("temp/header", $data); ?>

      <!-- MAIN -->
      <main role="main">
        <!-- Content -->
        <article>
          <header class="section background-white">
            <div class="line text-center">        
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">ACCOUNT VERIFIED</h1>
              <p class="margin-bottom-0 text-size-16 text-dark">Your account is offically verified <br></p>

              
              <a href="<?=ROOT?>login">Login Your Account</a>
            </div>  
          </header>

          <header class="section-top-padding background-white">
            <div class="line text-center">        
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1"></h1>
              

            </div>  
          </header>
          

        </article>
      </main>
      
<?php $this->view("temp/footer", $data); ?>