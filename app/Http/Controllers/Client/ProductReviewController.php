<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminProduct;
use App\Models\Client\ProductReview;
use Illuminate\Support\Facades\Auth;
class ProductReviewController extends Controller
{
    public function store(Request $request, AdminProduct $product)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $review = new ProductReview([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $review->save();

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi.');
    }
}
