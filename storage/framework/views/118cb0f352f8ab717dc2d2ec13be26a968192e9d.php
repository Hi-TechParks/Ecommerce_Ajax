<?php $__env->startSection('content'); ?>


    <!--== Dashboard Area Start ==-->
    <section class="section mt-50" id="deshboard">
      <div class="container">
        <!--== Dashboard Breadcrumb Start ==-->
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--== Dashboard Breadcrumb End ==-->

        <div class="row">
          <!--== Dashboard Sidebar Start ==-->
          <aside class="col-md-3">
            <?php echo $__env->make('admin.inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </aside>
          <!--== Dashboard Sidebar End ==-->

          <!--== Dashboard Main Start ==-->
          <main class="col-md-9">
            <div class="card">
              <div class="card-body">
                <!--== Search Form Start ==-->
                <!-- <form action="<?php echo e(url('/admin/product/item')); ?>" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="product_name" placeholder="Item Title">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success">Search</button>
                    </div>
                  </div>
                </form> -->
                <!--== Search Form End ==-->


                <?php echo $__env->make('admin.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <a href="/admin/offer" class="btn btn-primary">Refresh</a>


                <!-- Add New Record Start -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                  Add Offer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Offer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          

                        <!--== Data Form Start ==-->
                        <form action="<?php echo e(url('/admin/offer/store')); ?>" method="post" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Name</label>
                            <div class="col-sm-8">
                              <input type="text"  class="form-control" name="offer_name" placeholder="Offer Name">

                              <?php if($errors->has('offer_name')): ?>
                                  <span class="error_msg">
                                    <?php echo e($errors->first('offer_name')); ?>

                                  </span>
                              <?php endif; ?>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Percentage</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="offer_percentage" placeholder="Offer Percentage">

                              <?php if($errors->has('offer_percentage')): ?>
                                  <span class="error_msg">
                                    <?php echo e($errors->first('offer_percentage')); ?>

                                  </span>
                              <?php endif; ?>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Start</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="offer_start" placeholder="Offer Start">

                              <?php if($errors->has('offer_start')): ?>
                                  <span class="error_msg">
                                    <?php echo e($errors->first('offer_start')); ?>

                                  </span>
                              <?php endif; ?>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer End</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="offer_end" placeholder="Offer End">

                              <?php if($errors->has('offer_end')): ?>
                                  <span class="error_msg">
                                    <?php echo e($errors->first('offer_end')); ?>

                                  </span>
                              <?php endif; ?>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Child Exist</label>
                            <div class="col-sm-8">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="child_exist" value="1" id="child_exist">
                                <label class="custom-control-label" for="child_exist">Has Child</label>
                              </div>

                              <?php if($errors->has('child_exist')): ?>
                                  <span class="error_msg">
                                    <?php echo e($errors->first('child_exist')); ?>

                                  </span>
                              <?php endif; ?>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success">Submit</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </form>
                        <!--== Data Form End ==-->


                      </div>
                    </div>
                  </div>
                </div>
                <!-- Add New Record End -->

              </div>
            </div>

            <!--== Data table Start ==-->
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <caption>List of Offers</caption>
                <thead>
                  <tr>
                    <th scope="col">Offer Name</th>
                    <th scope="col">Offer Percentage</th>
                    <th scope="col">Offer Start</th>
                    <th scope="col">Offer End</th>
                    <th scope="col">Has Child</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Child</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($offer->OFFER_NAME); ?></td>
                    <td><?php echo e($offer->OFFER_PERCENTAGE); ?> %</td>
                    <td><?php echo e($offer->VALID_FROM_DATE); ?></td>
                    <td><?php echo e($offer->VALID_END_DATE); ?></td>
                    <td>
                      <?php if( $offer->CHD_EXIST == '1' ): ?>
                        Yes
                      <?php else: ?>
                        No
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if( $offer->ACTIVE_STATUS == '1' ): ?>
                        <span class="active_status">Active</span>
                      <?php else: ?>
                        <span class="inactive_status">Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if( $offer->CHD_EXIST == '1' ): ?>
                      <a href="/admin/offer/category/<?php echo e($offer->OFFER_ID); ?>" class="btn btn-success">Child</a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <!-- <a href="/admin/product/item/size/edit/<?php echo e($offer->OFFER_ID); ?>" class="btn btn-primary">Edit</a> -->

                      <!-- Edit Record Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-<?php echo e($offer->OFFER_ID); ?>">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal-<?php echo e($offer->OFFER_ID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalTitle">Edit Offer</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            



                            <!--== Data Form Start ==-->
                            <form action="/admin/offer/update/<?php echo e($offer->OFFER_ID); ?>" method="post" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Name</label>
                                <div class="col-sm-8">
                                  <input type="text"  class="form-control" name="offer_name" value="<?php echo e($offer->OFFER_NAME); ?>" placeholder="Offer Name">

                                  <?php if($errors->has('offer_name')): ?>
                                      <span class="error_msg">
                                        <?php echo e($errors->first('offer_name')); ?>

                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Percentage</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="offer_percentage" value="<?php echo e($offer->OFFER_PERCENTAGE); ?>" placeholder="Offer Percentage">

                                  <?php if($errors->has('offer_percentage')): ?>
                                      <span class="error_msg">
                                        <?php echo e($errors->first('offer_percentage')); ?>

                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Start</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control" name="offer_start" value="<?php echo e($offer->VALID_FROM_DATE); ?>" placeholder="Offer Start">

                                  <?php if($errors->has('offer_start')): ?>
                                      <span class="error_msg">
                                        <?php echo e($errors->first('offer_start')); ?>

                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer End</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control" name="offer_end" value="<?php echo e($offer->VALID_END_DATE); ?>" placeholder="Offer End">

                                  <?php if($errors->has('offer_end')): ?>
                                      <span class="error_msg">
                                        <?php echo e($errors->first('offer_end')); ?>

                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Child Exist</label>
                                <div class="col-sm-8">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="child_exist" value="1" id="child_exist_<?php echo e($offer->OFFER_ID); ?>" <?php if( $offer->CHD_EXIST == '1' ): ?> checked <?php endif; ?>>
                                    <label class="custom-control-label" for="child_exist_<?php echo e($offer->OFFER_ID); ?>">Has Child</label>
                                  </div>

                                  <?php if($errors->has('child_exist')): ?>
                                      <span class="error_msg">
                                        <?php echo e($errors->first('child_exist')); ?>

                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Active Status</label>
                                <div class="col-sm-8">
                                  <select class="form-control" name="active_status">
                                    <option value="1" <?php if( $offer->  ACTIVE_STATUS == '1' ): ?> selected <?php endif; ?>>Active</option>
                                    <option value="0" <?php if( $offer->  ACTIVE_STATUS == '0' ): ?> selected <?php endif; ?>>Inactive</option>
                                  </select>

                                  <?php if($errors->has('active_status')): ?>
                                      <span class="error_msg">
                                        <?php echo e($errors->first('active_status')); ?>

                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                            <!--== Data Form End ==-->



                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Edit Record Start -->



                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>

            <?php echo e($offers->links()); ?>

            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/admin/offer/offer_list.blade.php */ ?>