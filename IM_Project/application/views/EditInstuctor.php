<body>

 <div class="col-lg-12">
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
       
       <div class="col-md-12" style="background-color: #222;">
                              
                              <div class="row">
                                  <div class="box">
                                      <div class="col-lg-12">
                                      <br>
                                      <br>
          <div class="jumbotron" style="background-color: #337ab7; border-radius: 4px;">
          <h1><span class="glyphicon glyphicon-user"></span> Edit Instructors Info</h1>  
          </div>
                                          <br>
                              <form>

                              <div class='form-group col-lg-6 has-info'>
                              <label>First Name  </label>
                              <input type='text' class='form-control' placeholder='Name' required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Last Name </label>
                              <input type='text' class='form-control' placeholder='Family name' required  />
                              </div>

                              <div class='form-group col-lg-12 has-info'>
                              <label>Schedule</label>
                              <textarea class="form-control" placeholder="Type in your schedule" required></textarea>
                              </div>
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Email  </label>
                              <input type='email' class='form-control' placeholder='Email' required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>ID number </label>
                              <input type='text' class='form-control' placeholder='ID number' required />
                              </div>
                            
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Username  </label>
                              <input type='text' class='form-control' placeholder='Username' required/>
                              
                              </div>
                            
                              <div class='form-group col-lg-6 has-info'>
                              <label>Password  </label>
                              <input type='password' class='form-control' placeholder='Password' required />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                                <label>Gender</label>       
                                  <select class='form-control' name='gender'>
                                      <option value=''>Select Gender</option>
                                      <option value='Male'>Male</option>
                                      <option value='Female'>Female</option>
                                  </select>
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Retype Password  </label> 
                              <input type='password' class='form-control' placeholder='Retype password' required  />
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Phone Number  </label>
                              <input type='text' class='form-control' placeholder='Mobile number' required  />
                              </div>

                                <div class='form-group col-lg-6 has-info'>
                                <label>Secret question</label>       
                                <select class='form-control' name="question">
                                        <option value='<?php echo $question; ?>'>Your previous question: <?php echo $question; ?></option>
                                      <option value='What is the name of the street you grew up in?'>What is the name of the street you grew up in?</option>
                                      <option value='What is the name of your favorite food?'>What is the name of your favorite food?</option>
                                      <option value='What is the name of your pet?'>What is the name of your pet?</option>
                                      <option value='What is your nickname?'>What is your nickname?</option>
                                  </select>
                              </div>

                              <div class='form-group col-lg-6 has-info'>
                              <label>Answer to Secret question</label>
                              <input type='text' class='form-control' placeholder='Answer' name="answer" required  />
                              </div>
                              
                              <div class='form-group col-lg-12 has-info'>
                              <input type='submit' class='btn btn-primary btn-lg btn-block' />
                              </div>
                            
                            </form>

                           
                                      </div>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>
                       
                   






</body>



