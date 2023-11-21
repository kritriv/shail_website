<?php include "header.php"; ?>
<body>
      <div class="container">
  <div class="full-con">
      <h4 class="new-wish">New Wishlist</h4>
      <h6>Name</h6>
            <div class="form-group">
   <input type="text" class="form-control new-wish-list" id="usr" placeholder="Enter Name of new wishlist">
</div>
         <button type="submit" class="bttn Save-bt">Save</button>
      <div class="row orderr-ht">
          <div class="col-12 leftt-part1 six-partt">
          
           <table class="table table-dark table-hover tab-l-fom">
    <thead class="in-tablee">
      <tr>
        <th>Name</th>
        <th>Quality</th>
        <th>Viewed</th>
        <th>Create</th>
        <th>Direct link</th>
        <th>Default</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><i class="fa fa-list" aria-hidden="true"></i> My wishlist</td>
        <td>2</td>
        <td>0</td>
        <td>2018-10-31 02:10:16</td>
        <td>View</td>
        <td><div class="form-check">
    <input type="checkbox" class="form-check-input" value="">
</div></td>
        <td><i class="fa fa-trash" aria-hidden="true"></i></td>
      </tr>
    
    </tbody>
  </table>
                 <button type="submit" class="bttn six-btynt"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Send this Wishlist</button>
          </div>
               
      </div>
          </div>
    </div>
    <?php include "footer.php"; ?>