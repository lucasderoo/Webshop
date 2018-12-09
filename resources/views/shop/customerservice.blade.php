@include('layouts.header')
<div class ="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="row">
        <div class="col-sm-12">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Customer Service</h1>
              <p class="lead">If you have a question for our customer service, feel free to contact us!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="name">
            Message</label>
        <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
            placeholder="Message"></textarea>
    </div>
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
        Send Message</button>
</div>
</div>
</form>
</div>
</div>
<div class="col-md-4">
<form>
<legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
<address>
<strong>Logo Here</strong><br>
1600 Amphitheatre Pkwy<br>
Mountain View, CA 94043<br>
<abbr title="Phone">
P:</abbr>
(123) 456-7890
</address>
<address>
<strong>Full Name</strong><br>
<a href="mailto:#">first.last@example.com</a>
</address>
</form>
</div>
</div>
</div>
@include('layouts.footer')
