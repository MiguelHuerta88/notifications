<?php
/**
 * Created by PhpStorm.
 * User: miguelhuerta
 * Date: 5/22/18
 * Time: 1:30 PM
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use Validator;
use Hash;
use Log;


class SubscriptionController extends Controller
{
    /**
     * Subscriptions Model instance
     *
     * @var Subscriptions Model
     */
    public $subscriptions;

    public function __construct(Subscriptions $subscriptions)
    {
        // set up anything
        $this->subscriptions = $subscriptions;
    }


    /**
     * Create function
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        // call validate function
        list($isValid, $errors) = $this->validation($request, $this->subscriptions->getValidationRules());

        // if validation failed return
        if (!$isValid) {
           return response()->json($errors, 500);
        }

        // insert data
        return $this->insertSubscription($request);
    }

    protected function insertSubscription($request)
    {
        // pull all request data
        $data = $request->all();

        // next we need to hash endpoint before we insert it.
        $data['endpoint'] = Hash::make($data['endpoint']);
        // if user_id empty or null we remove from data array. Usually when user is not logged in we will get a null value
        if (isset($data['user_id']) && is_null($data['user_id'])) {
           unset($data['user_id']);
        }

        $record = $this->subscriptions->create($data);

        if($record) {
            // created
            return response()->json(['subscription_id' => $record->id]);
        }

        // return error response
        Log::error("Subscription could not be inserted for: " . json_encode($data));
        return response("Subscription could not be inserted", 500);
    }

    /**
     * Update Subscription method
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request)
    {
        // call validate function
        list($isValid, $errors) = $this->validation($request, $this->subscriptions->getValidationRules());

        // if validation failed return
        if (!$isValid) {
            return response()->json($errors, 500);
        }

        // update data
        // in order to update u first need to locate the model record we need. This can be done by checking the endpoint (hashing) and/or userId

    }

    /**
     * Validate inputs based on model rules
     *
     * @param Illuminate\Http\Request
     * @param array
     * @return array
     */
    public function validation(Request $request, $rules)
    {
        // instantiate validator
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // return back failure mesages
            return [
                false,
                $validator->messages()
            ];
        }

        //otherwise we passed validation
        return [true, []];
    }
}