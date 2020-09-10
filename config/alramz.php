<?php

    return [

        'migrate' => [
            'index' =>  10,
            'date' =>  2,
            'integer' =>  2,
            'decimal' =>  2,
            'string' =>  40,
        ],

        'head'  =>  [
            'index'     =>  ['ORDER STATUS','ACCOUNT NAME','SYMBOL','BROKER'],
            'date'      =>  [],
            'integer'   =>  [],
            'decimal'   =>  [],
            'string'    =>  ['CL MAIN CLIENT ID','CL CLIENT ID','UPLOAD DATE','OPER','T ORDER QTY','ORDER PRICE','REMAINING','ORDER ID','EXECUTED QTY','VALIDITY','AVG PRICE','LAST MOD DATE TIME','ENTRY DATE TIME','ORDER ACTION','NOTE REVIEW','REVIEWED BY'],
        ],

        'head_program'  =>  [
            'index'     =>  [],
            'date'      =>  [],
            'integer'   =>  [],
            'decimal'   =>  [],
            'string'    =>  ['Submit Type','Attachment','Compliance','Status - Broker','Status - Compliance','Note - Broker','Note - Compliance','Call Number','Call Extension'],
        ],

        'fields'    =>  [
            'broker_name'   =>  'BROKER',
            'compliance_name'   =>  'Compliance',
        ],

        'head_type' =>  [
            'text'      =>  ['index','string'],
            'number'    =>  ['integer','decimal'],
            'date'      =>  ['date'],
            'select'    =>  ['Status - Broker' => 'BrokerStatus','Status - Compliance' => 'ComplianceStatus'],
        ],

        'options'   =>  [
            'BrokerStatus'          =>  ['Submitted','Pending'],
            'ComplianceStatus'      =>  ['Approved','Rejected','Incomplete'],
        ],

        'views' =>  [
            'admin' =>  [
                'all'   =>  [
                    'paginate'  =>  50,
                    'conditions'    =>  [],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER']
                    ],
                    'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'new'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => null,'Status - Compliance' => null],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER']
                    ],
                    'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'pending'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => 'Submitted','Status - Compliance' => null],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER','Submit Type','Note - Broker']
                    ],
                    'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER','Submit Type','Note - Broker'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'rejected'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Rejected'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER','Submit Type','Note - Broker','Compliance','Note - Compliance']
                    ],
                    'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER','Submit Type','Note - Broker','Compliance','Note - Compliance'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'approved'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Approved'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER','Submit Type','Note - Broker','Compliance']
                    ],
                    'fields'    =>  ['ORDER ID','ACCOUNT NAME','SYMBOL','BROKER','Submit Type','Note - Broker','Compliance'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'broker'    =>  [
                    'new'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => null,'Status - Compliance' => null],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'pending'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Pending'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'submitted'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Submitted'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'unreviewed'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Submitted', 'Status - Compliance' => null],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'incomplete'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => null, 'Status - Compliance' => 'Incomplete'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'rejected'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Compliance' => 'Rejected'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'approved'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Compliance' => 'Approved'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                ]
            ],
            'broker' =>  [
                'dashboard' =>  [
                    'rejected'      =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Compliance' => 'Rejected'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','Note - Compliance']
                        ],
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','Note - Compliance'],
                        'actions'   =>  [],//['detail-modal','detail-page','submit']
                    ],
                    'incomplete'    =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => null, 'Status - Compliance' => 'Incomplete'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','Note - Broker'],
                        'actions'   =>  [],//['detail-modal','detail-page','submit']
                    ],
                    'pending'       =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Pending'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','Submit Type','Note - Broker'],
                        'actions'   =>  [],//['detail-modal','detail-page','submit']
                    ],
                ],
                'all'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  [],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'new'   =>  [
                    'paginate'  =>  200,
                    'conditions'    =>  ['Status - Broker' => null,'Status - Compliance' => null],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','submit']
                ],
                'pending'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => 'Pending'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','submit']
                ],
                'submitted'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => 'Submitted'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','undo']
                ],
                'unreviewed'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => 'Submitted', 'Status - Compliance' => null],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'incomplete'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => null, 'Status - Compliance' => 'Incomplete'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','submit']
                ],
                'rejected'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Rejected'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','submit']
                ],
                'approved'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Approved'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
            ],
            'compliance' =>  [
                'dashboard' =>  [
                    'pending'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Submitted','Status - Compliance' => null],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['ACCOUNT NAME','BROKER','Submit Type','Note - Broker'],
                        'actions'   =>  ['detail-modal','detail-page','mark']
                    ],
                ],
                'all'   =>  [
                    'paginate'  =>  50,
                    'conditions'    =>  [],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['ACCOUNT NAME','UPLOAD DATE','SYMBOL','OPER','UPLOAD DATE','ORDER ID','EXECUTED QTY','VALIDITY','AVG PRICE','ORDER STATUS','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','mark']
                ],
                'pending'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Broker' => 'Submitted','Status - Compliance' => null],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                    ],
                    'fields'    =>  ['ACCOUNT NAME','UPLOAD DATE','SYMBOL','OPER','UPLOAD DATE','ORDER ID','EXECUTED QTY','VALIDITY','AVG PRICE','ORDER STATUS','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page','mark']
                ],
                'approved'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Approved'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['ACCOUNT NAME','UPLOAD DATE','SYMBOL','OPER','UPLOAD DATE','ORDER ID','EXECUTED QTY','VALIDITY','AVG PRICE','ORDER STATUS','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'rejected'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Rejected'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                    ],
                    'fields'    =>  ['ACCOUNT NAME','UPLOAD DATE','SYMBOL','OPER','UPLOAD DATE','ORDER ID','EXECUTED QTY','VALIDITY','AVG PRICE','ORDER STATUS','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'incomplete'   =>  [
                    'paginate'  =>  5,
                    'conditions'    =>  ['Status - Compliance' => 'Incomplete'],
                    'detail'   =>  [
                        'title' =>  'ORDER ID',
                        'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                    ],
                    'fields'    =>  ['ACCOUNT NAME','UPLOAD DATE','SYMBOL','OPER','UPLOAD DATE','ORDER ID','EXECUTED QTY','VALIDITY','AVG PRICE','ORDER STATUS','REMAINING'],
                    'actions'   =>  ['detail-modal','detail-page']
                ],
                'broker'    =>  [
                    'new'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => null,'Status - Compliance' => null],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'pending'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Pending'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'submitted'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Submitted'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page','mark']
                    ],
                    'unreviewed'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => 'Submitted', 'Status - Compliance' => null],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page','mark']
                    ],
                    'incomplete'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Broker' => null, 'Status - Compliance' => 'Incomplete'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ORDER ID','ACCOUNT NAME','BROKER','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'rejected'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Compliance' => 'Rejected'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                    'approved'   =>  [
                        'paginate'  =>  5,
                        'conditions'    =>  ['Status - Compliance' => 'Approved'],
                        'detail'   =>  [
                            'title' =>  'ORDER ID',
                            'fields'    =>  ['ACCOUNT NAME','BROKER','ORDER ID','Compliance']
                        ],
                        'fields'    =>  ['CL CLIENT ID','ORDER STATUS','ACCOUNT NAME','SYMBOL','OPER','T ORDER QTY','BROKER','ORDER ID','VALIDITY','REMAINING'],
                        'actions'   =>  ['detail-modal','detail-page']
                    ],
                ]
            ],
        ],

        'submit'    =>  [
            'Call'  =>  ['Recording System' => 'Note - Broker','Agent/Extension' => 'Call Extension','Client Contact Number' => 'Call Number'],
            'Mail'  =>  ['Attachment File' => 'Attachment'],
            'Written'  =>  ['Comment' => 'Note - Broker', 'Attachment File' => 'Attachment'],
            'Make Pending'  =>  ['Comment' => 'Note - Broker'],
            'Bloomberg'  =>  ['Comment' => 'Note - Broker'],
        ],

        'submit_item_types' =>  [
            'Recording System'  => 'text',
            'Agent/Extension'   => 'text',
            'Client Contact Number' => 'text',
            'Attachment File'   => 'file',
            'Comment'           => 'textarea',
        ],

        'submit_optional' =>  [
            'Call'  =>  ['Client Contact Number']
        ],

        'activity'  =>  [
            'days'  =>  7,
            'format'    =>  'h:i a - D d/m',
            'count' =>  25
        ],

        'report'   =>  [
            'on'    =>  'UPLOAD DATE',
            'format'    =>  '%d-%m-%Y %H:%i', //MySQL format
        ],

        'record_view_heads'     =>  [
            'admin'     =>  ['ORDER STATUS','ACCOUNT NAME','SYMBOL'],
            'broker'     =>  ['ORDER STATUS','ACCOUNT NAME','SYMBOL'],
            'compliance'     =>  ['ORDER STATUS','ACCOUNT NAME','SYMBOL'],
        ],
        'record_view_count'     =>  [
            'admin'     =>  15,
            'broker'     =>  15,
            'compliance'     =>  15,
        ],
        'record_detail_view_title'     =>  [
            'admin'     =>  'ORDER ID',
            'broker'     =>  'ORDER ID',
            'compliance'     =>  'ORDER ID',
        ],
        'detail_view_ignore'     =>  [
            'admin'     =>  [],
            'broker'     =>  [],
            'compliance'     =>  [],
        ],
        'detail_view_title'     =>  [
            'admin'     =>  'ORDER ID',
            'broker'     =>  'ORDER ID',
            'compliance'     =>  'ORDER ID',
        ],
    ];
