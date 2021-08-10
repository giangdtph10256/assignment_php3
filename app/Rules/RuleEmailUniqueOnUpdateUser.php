<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
use phpDocumentor\Reflection\Types\Boolean;

class RuleEmailUniqueOnUpdateUser implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $newEmail)
    {
        $oldEmail = request()->user->email;
        if ($newEmail === $oldEmail) {
            // Không update email -> trả về true -> cho phép request tiếp tục
            return true;
        }

        // email cũ khác email mới -> có update
        // -> kiểm tra trong DB xem có bản ghi nào có email trùng với email mới update hay không
        // nếu có -> false, không có -> true
        $kiemTra = User::where('email', $newEmail)->count();
        // SELECT COUNT(*) FROM users WHERE email = {$newEmail}
        if ($kiemTra > 0) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email đã tồn tại';
    }
}