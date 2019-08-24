          <aside class="item-4" id="sidebar_filters">
            <div class="accordion sidebar-tab" id="accordionCategory">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Product Category <span><i class="fas fa-chevron-down"></i></span>
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionCategory">
                  <div class="card-body">
                    
                    <nav id="column_left">  
                      <ul class="nav nav-list" id="sidebar-nav">

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- <li><a href="#<?php echo e($category->PRODUCT_CATEGORY_ID); ?>"><?php echo e($category->CATEGORY_NAME); ?></a></li> -->

                        <li class="pro_cate" id="pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>" value="<?php echo e($category->PRODUCT_CATEGORY_ID); ?>">
                          <a href="#">
                            <span><i class="fas fa-angle-right"></i></span> 
                            <?php echo e($category->CATEGORY_NAME); ?>

                          </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </ul>
                    </nav>

                  </div>
                </div>
              </div>
            </div>
            
            <!-- Search Filter -->

            <div id="search_filers">
            <!-- Dynamic Ajax Filter Option -->

            <?php $__currentLoopData = $left_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $left_banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Sidebar Temporary Ad Portion -->
            <div class="single-discount">
              <div class="discount-image">
                <img src="/uploads/images/banner/<?php echo e($left_banner->IMAGE_PATH); ?>" class="mx-auto d-block" alt="discount">
                <div class="discount-details">
                  <div class="discount-details-inner">
                    <div class="discount-title"><?php echo e($left_banner->BANNER_TITLE); ?></div>
                    <p class="discount-desc"><?php echo e($left_banner->BANNER_DESC); ?></p>
                    <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sidebar Temporary Ad Portion -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </div>
            <!-- Search Filter -->

          </aside>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/search.blade.php */ ?>