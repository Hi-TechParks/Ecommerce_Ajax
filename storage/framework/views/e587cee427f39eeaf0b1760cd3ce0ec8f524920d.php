                    <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <a href="#"><img src="/products/<?php echo e($cart_item->PRODUCT_ID); ?>/<?php echo e($cart_item->IMAGE_PATH); ?>" class="img-fluid mx-auto d-block" alt="Product"></a>
                      </td>
                      <td><a href="#"><?php echo e($cart_item->PRODUCT_NAME); ?></a></td>
                      <td>
                        <input type="number" class="form-control" name="" value="<?php echo e($cart_item->QTY); ?>" min="1">
                      </td>
                      <td><?php echo e($cart_item->PRICE); ?> Tk</td>
                      <td> Tk</td>
                      <td>
                        <ul>
                        <li class="remove_cart_item" id="remove_cart_item_<?php echo e($cart_item->CART_ID); ?>" value="<?php echo e($cart_item->CART_ID); ?>"><i class="fas fa-window-close"></i>

                          <!-- Get Cart id in hidden form -->
                          <input type="hidden" name="cart_id" value="<?php echo e($cart_item->CART_ID); ?>">
                          <!-- Get Cart id in hidden form -->
                        </li>
                        </ul>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/cart_page_items.blade.php */ ?>