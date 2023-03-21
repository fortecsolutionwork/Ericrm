{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
    <div class="container px-0">
        <div class="box-layout">
            <div class="form-header mb-4">
                <h4>Support Tickets</h4>
                <a href="http://localhost/ericCrm%20%282%29/admin/create-ticket" class="btn btn-primary">Create Ticket</a>
            </div>
            <div class="table-controls">
                <form action="" enctype="multipart/form-data" method="GET" id="formsub">
                    <div class="filters">
                        <input type="text" name="ticket" id="" value="" placeholder="Search Ticket" class="form-control" onkeypress="submitOnEnter(event)">
                        <select class="form-control" name="status" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="1">Active</option>
                            <option value="2">closed</option>
                            <option value="3">In Progress</option>
                        </select>
                        <select class="form-control" name="Category" onchange="this.form.submit()">
                            <option value="" selected="" disabled="">Select Category</option>
                            <option value="1">Technical Support</option>
                            <option value="2">Billing</option>
                            <option value="3">Sales</option>
                        </select>

                    </div>
                </form>
            </div>
            <div class="reponsive-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Last Updated</th>
                            <th>Ticket No.</th>
                            <th>Subject</th>
                            <th>Created On</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 21, 2023</td>
                            <td>#42</td>
                            <td>testing</td>
                            <td>March 21, 2023</td>
                            <td>shivam</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/42/83" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/42" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/42" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 20, 2023</td>
                            <td>#41</td>
                            <td>在哪裡 在哪裡 在哪裡 在哪裡 在哪裡</td>
                            <td>March 20, 2023</td>
                            <td>Webzolution</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/41/67" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/41" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/41" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 20, 2023</td>
                            <td>#40</td>
                            <td>Add more</td>
                            <td>March 20, 2023</td>
                            <td>rajeev</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/40/50" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/40" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/40" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 20, 2023</td>
                            <td>#39</td>
                            <td>在哪裡</td>
                            <td>March 20, 2023</td>
                            <td>rajeev</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/39/50" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/39" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/39" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 18, 2023</td>
                            <td>#38</td>
                            <td>gfgsgsdfg</td>
                            <td>March 18, 2023</td>
                            <td>tanuj</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/38/82" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/38" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/38" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 17, 2023</td>
                            <td>#37</td>
                            <td>Numquam recusandae</td>
                            <td>March 17, 2023</td>
                            <td>Webzolution</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/37/67" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/37" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/37" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 16, 2023</td>
                            <td>#36</td>
                            <td>Gyy</td>
                            <td>March 16, 2023</td>
                            <td>karn</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/36/60" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/36" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/36" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 16, 2023</td>
                            <td>#35</td>
                            <td>infotest@estudio.comndf</td>
                            <td>March 16, 2023</td>
                            <td>te</td>
                            <td><span class="status active">In Progress</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/35/74" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/35" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/35" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 16, 2023</td>
                            <td>#34</td>
                            <td>moh</td>
                            <td>March 16, 2023</td>
                            <td>Webzolution</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/34/45" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/34" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/34" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>March 16, 2023</td>
                            <td>#33</td>
                            <td>在哪裡</td>
                            <td>March 16, 2023</td>
                            <td>Webzolution</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions"><a href="http://localhost/ericCrm%20%282%29/admin/ticket-details/33/45" class="view"><i class="fa fa-eye"></i></a><a href="http://localhost/ericCrm%20%282%29/admin/edit-ticket/33" class="edit"><i class="fa fa-edit"></i></a> <a href="http://localhost/ericCrm%20%282%29/admin/delete-ticket/33" onclick="return confirm('Are you sure you want to delete this item?')" ;="" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table_footer">
                <!-- <span class="page_number">Showing <strong>1 of 7</strong></span>
                <ul class="pagination">
                    <li><a href="#" class="prev">Previous</a></li>
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#" class="next">Next</a></li>
                </ul> -->
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                    <div class="flex justify-between flex-1 sm:hidden">
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                            « Previous
                        </span>

                        <a href="http://localhost/ericCrm%20%282%29/admin/all-tickets?page=2" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Next »
                        </a>
                    </div>

                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 leading-5">
                                Showing
                                <span class="font-medium">1</span>
                                to
                                <span class="font-medium">10</span>
                                of
                                <span class="font-medium">24</span>
                                results
                            </p>
                        </div>

                        <div>
                            <span class="relative z-0 inline-flex shadow-sm rounded-md">

                                <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>





                                <span aria-current="page">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                                </span>
                                <a href="http://localhost/ericCrm%20%282%29/admin/all-tickets?page=2" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                                    2
                                </a>
                                <a href="http://localhost/ericCrm%20%282%29/admin/all-tickets?page=3" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 3">
                                    3
                                </a>


                                <a href="http://localhost/ericCrm%20%282%29/admin/all-tickets?page=2" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
</section>
{{View::make('admin.footer')}}
<script>
    function submitOnEnter(e) {
        if (e.which == 13) {
            document.getElementById("formsub").submit()
        }
    }
</script>