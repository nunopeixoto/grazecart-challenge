<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    private $orderSchema = [
        'id',
        'tracking_id',
        'type_id',
        'order_number',
        'customer_id',
        'staff_id',
        'accounting_id',
        'total',
        'payments_subtotal',
        'original_total',
        'subtotal',
        'original_subtotal',
        'tax',
        'original_tax',
        'tax_rate',
        'weight_in_pounds',
        'weight_in_ounces',
        'original_weight_in_pounds',
        'original_weight_in_ounces',
        'order_discount',
        'coupon_subtotal',
        'discount_type',
        'fees_subtotal',
        'original_fees_subtotal',
        'credit_applied',
        'delivery_rate',
        'delivery_fee_type',
        'delivery_fee',
        'schedule_id',
        'pickup_id',
        'status_id',
        'status',
        'deadline_date',
        'pickup_date',
        'original_pickup_date',
        'customer_first_name',
        'customer_last_name',
        'customer_email',
        'customer_email_alt',
        'customer_phone',
        'customer_phone_2',
        'shipping_street',
        'shipping_street_2',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'shipping_country',
        'billing_street',
        'billing_street_2',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_country',
        'customer_notes',
        'packing_notes',
        'invoice_notes',
        'payment_notes',
        'flagged',
        'fulfillment_error',
        'packed',
        'canceled',
        'confirmed',
        'confirmed_date',
        'due_date',
        'payment_terms',
        'processed',
        'processed_date',
        'payment_id',
        'payment_source_id',
        'paid',
        'payment_date',
        'containers',
        'containers_2',
        'exported',
        'picked_up',
        'last_modified_by',
        'first_time_order',
        'created_at',
        'updated_at',
        'items' => [
            '*' => [
                'id',
                'order_id',
                'product_id',
                'title',
                'unit_of_issue',
                'unit_price',
                'original_unit_price',
                'store_price',
                'quantity',
                'original_quantity',
                'weight_in_pounds',
                'weight_in_ounces',
                'original_weight_in_pounds',
                'original_weight_in_ounces',
                'subtotal',
                'taxable',
                'tax',
                'discount',
                'discount_type',
                'stock_status',
                'created_at',
                'updated_at',
                'product' => [
                    'id',
                    'title',
                    'slug',
                    'type_id',
                    'fulfillment_id',
                    'sku',
                    'barcode',
                    'vendor_id',
                    'unit_price',
                    'wholesale_unit_price',
                    'sale_unit_price',
                    'unit_of_issue',
                    'unit_description',
                    'weight_in_pounds',
                    'weight_in_ounces',
                    'item_cost',
                    'inventory_type',
                    'qty_on_hand',
                    'qty_at_processor',
                    'qty_off_site',
                    'stock_out_threshold',
                    'is_sale',
                    'is_visible',
                    'is_bundle',
                    'is_taxable',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]
    ];

    public function test_orders_index()
    {
        $response = $this->get('/api/orders');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => $this->orderSchema
            ],
            'links' => [
                'first',
                'last',
                'prev',
                'next'
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active'
                    ]
                ],
                'path',
                'per_page',
                'to',
                'total'
            ]
        ]);
    }

    public function test_order_show()
    {
        $response = $this->get('/api/orders/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => $this->orderSchema
        ]);
    }
}
