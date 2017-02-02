package com.example.tarikul.fcmtest;

import android.os.AsyncTask;
import android.util.Log;

import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.FirebaseInstanceIdService;

import java.io.IOException;

import okhttp3.FormBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

/**
 * Created by interspeed.com.bd on 21-Aug-16.
 */
public class FirebaseIDService extends FirebaseInstanceIdService {
    public static final String TAG = "MyFirebaseIIDService";
    String refreshedToken ="";
    String URL ="http://10.0.0.16/fcm/register.php";
    @Override
    public void onTokenRefresh() {

         //Getting registration token
        refreshedToken = FirebaseInstanceId.getInstance().getToken();

        //Displaying token on logcat
        Log.d(TAG, "Refreshed token: " + refreshedToken);
        sendRegistrationToServer(refreshedToken);

    }

    private void sendRegistrationToServer(String token) {
        //You can implement this method to store the token on your server
        //Not required for current project
        RegisterToken registerToken = new RegisterToken();
        registerToken.execute();
    }

    class RegisterToken extends AsyncTask<String,Void,String> {


        @Override
        protected void onPreExecute() {
            super.onPreExecute();

        }

        @Override
        protected String doInBackground(String... params) {

            OkHttpClient client = new OkHttpClient();

            try {
                RequestBody requestBody = new FormBody.Builder()
                        .add("Token",refreshedToken).add("Number","01923335691")
                        .build();


                Request request = new Request.Builder()
                        .url(URL)
                        .post(requestBody)
                        .build();


                Response response = null;
                //client.setRetryOnConnectionFailure(true);
                response = client.newCall(request).execute();
                if (response.isSuccessful()){
                    String datae = response.body().string();
                    int code = response.code();
                }
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }

        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);

        }
    }
}
