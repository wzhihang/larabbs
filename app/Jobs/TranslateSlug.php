<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        //队列任务构造器中接收了 Eloquent 模型,将会只序列化模型的ID
        $this->topic = $topic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //请求百度API进行翻译
        $slug = app(SlugTranslateHandler::class)->translate($this->topic->title);

        //避免模型调用行程死循环,使用DB直接进行数据库操作
        \DB::table('topics')->where(['id'=>$this->topic->id])->update(['slug' => $slug]);
    }
}
