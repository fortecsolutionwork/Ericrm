{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
 
    <div class="container px-0">
        <div class="box-layout">
             <div class="form-header mb-5 d-flex justify-content-between">
                <h4>All Orders</h4>
                <button class="btn btn-primary"><a href="/admin/new-order.html" style="color:#fff">Create New order</a> </button>
            </div>
           
            <div class="reponsive-table">
                <table class="table">
                 <thead>
                    <tr>
                        <th><input type="checkbox" /></th>
                        <th>Date</th>
                        <th>Number</th>
                        <th>Customer</th>
                        <th>Detail</th>
                        <th>Total</th>
                        <th>Status</th>
                      
                        <th>Actions</th>
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>June 26, 2021</td>
                        <td>#3201</td>
                        <td>Jessica Moore</td>
                        <td>Webzolution credits x 20</td>
                        <td>$700.00</td>
                        <td><span class="status process">Processing</span></td>
                        <td class="actions"><a href="/admin/order-detail.html" class="edit"><i class="fa fa-eye"></i></a>  <a href="/admin/edit-order.html" class="edit"><i class="fa fa-edit"></i></a> <a href=""  class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>June 26, 2021</td>
                        <td>#3201</td>
                        <td>Jessica Moore</td>
                        <td>Added 4 pages of medium complexity for www.domain.com</td>
                        <td>$700.00</td>
                        <td><span class="status s_progress">Work in Progress</span></td>
                        <td class="actions"><a href="/admin/order-detail.html" class="edit"><i class="fa fa-eye"></i></a>  <a href="/admin/edit-order.html" class="edit"><i class="fa fa-edit"></i></a> <a href=""  class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>June 26, 2021</td>
                        <td>#3201</td>
                        <td>Jessica Moore</td>
                        <td>Website design and build pack</td>
                        <td>$700.00</td>
                        <td><span class="status active">Completed</span></td>
                        <td class="actions"><a href="/admin/order-detail.html" class="edit"><i class="fa fa-eye"></i></a>  <a href="/admin/edit-order.html" class="edit"><i class="fa fa-edit"></i></a> <a href=""  class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>June 26, 2021</td>
                        <td>#3201</td>
                        <td>Jessica Moore</td>
                        <td>Website design and build pack</td>
                        <td>$700.00</td>
                        <td><span class="status s_progress">Work in Progress</span></td>
                        <td class="actions"><a href="/admin/order-detail.html" class="edit"><i class="fa fa-eye"></i></a>  <a href="/admin/edit-order.html" class="edit"><i class="fa fa-edit"></i></a> <a href=""  class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>June 26, 2021</td>
                        <td>#3201</td>
                        <td>Jessica Moore</td>
                        <td>Website design and build pack</td>
                        <td>$700.00</td>
                        <td><span class="status process">Processing</span></td>
                        <td class="actions"><a href="/admin/order-detail.html" class="edit"><i class="fa fa-eye"></i></a>  <a href="/admin/edit-order.html" class="edit"><i class="fa fa-edit"></i></a> <a href=""  class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>June 26, 2021</td>
                        <td>#3201</td>  
                        <td>Jessica Moore</td>
                        <td>Website design and build pack</td>
                        <td>$700.00</td>
                        <td><span class="status receive">Received</span></td>
                        <td class="actions"><a href="/admin/order-detail.html" class="edit"><i class="fa fa-eye"></i></a>  <a href="/admin/edit-order.html" class="edit"><i class="fa fa-edit"></i></a> <a href=""  class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    
                 </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
{{View::make('admin.footer')}}