<?php

use Illuminate\Database\Seeder;

class HarvestQrcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Faq::class)->create([
            'title_ar' => ' هل تستوعب حميات أو حميات معينة؟',
            'content_ar' => ' نحن نستوعب مجموعة متنوعة من التفضيلات الغذائية - على سبيل المثال النباتيين ، أو إذا كنت لا تأكل اللحوم الحمراء والأسماك والمحار ، أو لحم الضأن - وتخصيص القائمة الخاصة بك كل أسبوع بناء على تفضيلاتك. يتم تجميع كل صناديقنا في نفس منشأة المعالجة ، لذلك لا نوصي بالطلب  إذا كان لديك حساسية خطيرة للأطعمة.',
            'title_en' => 'Do you accommodate specific diets or allergies?',
            'content_en' => 'We accommodate a variety of dietary preferences - e.g. vegetarians, pescetarians, or if you don’t eat red meat, fish, shellfish, pork, or lamb - and personalize your menu each week based on your preferences. All of our boxes are assembled in the same processing facility, so we don\'t recommend ordering Blue Apron if you have a serious food allergy.',
        ]);
    }
}
