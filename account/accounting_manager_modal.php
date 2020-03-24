<?php
session_start();
include '../database/connection.php';
?>
<!------------------------------------------Add External Carrier------------------------------------------------------------------------------------>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     id="accounting_modal"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Account</h5>
                <button type="button" class="close modalCarrier" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="payment-container" style="z-index: 1600"></div>
                <div class="factoring-container" style="z-index: 1600"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item1 show" id="home-title">
                        <a class="nav-link1 active" id="home-tab" data-toggle="tab"
                           href="#carrier" role="tab" aria-controls="home"
                           aria-selected="true" onclick="toggleAccount('first');">Deliver</a>
                    </li>
                    <li class="nav-item1" id="insurance-title">
                        <a class="nav-link1" id="insurance-tab" data-toggle="tab"
                           href="#insurance" role="tab" aria-controls="profile"
                           aria-selected="false" onclick="toggleAccount('second');">Invoice</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="carrier"
                         role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <!--- table one here --->
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <br>
                                <div id="table-scroll" class="table-scroll">
                                    <table id="carrier_table" class="scroll">
                                        <thead>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="toggleCarrier('first')" class="btn btn-success float-right">Next
                        </button>
                    </div>
                    <div class="tab-pane fade" id="insurance" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <br>
                                <div id="table-scroll" class="table-scroll">
                                    <table id="carrier_table" class="scroll">
                                        <thead>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button style="margin-right: 3px"
                                class="float-right btn btn-secondary">Close
                        </button>
                    </div>
                </div>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->



