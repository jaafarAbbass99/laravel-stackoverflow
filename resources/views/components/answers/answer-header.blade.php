

<div class="flex items-center justify-between mt-4">

    <span class="text-gray-900">{{$answers}} {{$answers>1 ? " Answers" : " Answer" }}</span>

    <div class="flex items-center justify-center">
        <div class="flex flex-col items-end justify-center m-1">
            <span class="text-sm">sorted by:</span>
            <a href="" class="text-xs text-sky-700">Reset to default</a>
        </div>
        
        <select name="sorted by" id="sorted by" 
            class="border border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500
            rounded-md bg-white px-2 py-1 
            text-sm "
        >
            <option value="volvo"> {{$sortingby['Highest score']}}</option>
            <option value="saab">
                {{$sortingby['Trending']}}
            </option>
            <option value="opel">{{$sortingby['Date modified']}}</option>
            <option value="audi">{{$sortingby['Date created']}}</option>
        </select>
    </div>
</div>