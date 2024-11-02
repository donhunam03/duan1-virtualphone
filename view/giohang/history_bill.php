<div class="breadcrumb-area mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
                <h2> Đơn hàng</h2>
                <div class="breadcrumb__option">

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
            <tr>
                <th class="jb-product-thumbnail">Code</th>
                <th class="cart-product-name">Tên người đặt</th>
                <th class="jb-product-quantity">Thời gian tạo</th>
                <th class="jb-product-quantity">Tổng tiền</th>
                <th class="jb-product-remove">Thao tác</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($public as $item) : ?>
                    <a href="<?= $item['id_bill']?>">
                        <tr>
                            <!-- <input type="hidden" id="code" value=""> -->
                            <td class="jb-product-price"><span class=""><?= $item['bill_code'] ?> </span></td>
                            <td class="jb-product-price"><span class=""><?= $item['full_name'] ?> </span></td>
                            <td class="jb-product-price"><span class=""><?= $item['order_date']  ?></span></td>
                            <td class="jb-product-price"><span class=""><?= number_format($item['total_amount'])?>.đ</span></td>
                            <td>
                                <?php if($item['status'] == 0) : ?>
                                <button type="button" class="btn btn-danger" disabled>Đã Hủy</button>
                                    <a href="?act=create_bill&id=<?=$item['id_bill']?>" onclick="return confirm('Bạn muốn mua lại đơn hàng này chứ ?')"><button type="button" class="btn btn-success">Mua lại</button></a>
                                    <a href="?act=detail_bill&id=<?=$item['id_bill']?>"><button type="button" class="btn btn-warning">chi tiết</button></a>
                                <?php endif; ?>
                                <?php if($item['status'] == 1) : ?>
                                    <button type="button" class="btn btn-success" disabled>Chờ xác nhận</button>
                                <a href="?act=deleted_bill&id=<?=$item['id_bill']?>" onclick="return confirm('Bạn muốn hủy đơn hàng này chứ ?')"><button type="button" class="btn btn-danger">Hủy Đơn</button></a>
                                    <a href="?act=detail_bill&id=<?=$item['id_bill']?>"><button type="button" class="btn btn-warning">chi tiết</button></a>
                                <?php endif; ?>
                                <?php if($item['status'] == 2) : ?>
                                    <button type="button" class="btn btn-success" disabled>Đang sử̉ Lý</button>
                                    <a href="?act=detail_bill&id=<?=$item['id_bill']?>"><button type="button" class="btn btn-warning">chi tiết</button></a>
                                <?php endif; ?>
                                <?php if($item['status'] == 3) : ?>
                                    <button type="button" class="btn btn-success" disabled>Đang giao</button>
                                    <a href="?act=detail_bill&id=<?=$item['id_bill']?>"><button type="button" class="btn btn-warning">chi tiết</button></a>
                                <?php endif; ?>
                                <?php if($item['status'] == 4) : ?>
                                    <a href="?act=success_bill&id=<?=$item['id_bill']?>" onclick="return confirm('Bạn muốn xác nhận đơn hàng này chứ ?')"><button type="button" class="btn btn-success">Nhận hàng thành công</button></a>
                                    <a href="?act=detail_bill&id=<?=$item['id_bill']?>"><button type="button" class="btn btn-warning">chi tiết</button></a>
                                <?php endif; ?>
                                <?php if($item['status'] == 5) : ?>
                                    <button type="button" class="btn btn-success" disabled>Đã mua</button>
                                    <a href="?act=detail_bill&id=<?=$item['id_bill']?>"><button type="button" class="btn btn-warning">chi tiết</button></a>
                                <?php endif; ?>

                            </td>

                        </tr>
                    </a>

              <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>
