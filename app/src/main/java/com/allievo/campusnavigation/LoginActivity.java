package com.allievo.campusnavigation;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.allievo.campusnavigation.Utils.GlobalPreference;
import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {

    private EditText loginPhoneET, loginPasswordET;
    private String ip;
    private GlobalPreference preference;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        initViews();

        preference = new GlobalPreference(this);
        ip = preference.RetriveIP();
    }


    public void registerUser(View view) {
        startActivity(new Intent(this, RegisterActivity.class));
    }


    public void userLogin(View view) {

        String phone = loginPhoneET.getText().toString();
        String password = loginPasswordET.getText().toString();

        StringRequest request = new StringRequest(Request.Method.POST, "http://"+ip+"/navigation/api/user_login.php", new Response.Listener<String>() {
            @Override
            public void onResponse(String s) {

                String result = s.trim();
                Log.d("******", "onResponse: "+result);
                if(result.equals("failed")){
                    Toast.makeText(LoginActivity.this, "Failed! Try Again!", Toast.LENGTH_SHORT).show();
                }else if(result.equals("error")){
                    Toast.makeText(LoginActivity.this, "Wrong Credentials", Toast.LENGTH_SHORT).show();
                }else {
                    Toast.makeText(LoginActivity.this, "Login successful", Toast.LENGTH_SHORT).show();
                    try {
                        JSONObject object = new JSONObject(result);
                        String id = object.getString("id");
                        String name = object.getString("name");

                        preference.setUID(id);
                        preference.setName(name);

                    } catch (JSONException e) {
                        throw new RuntimeException(e);
                    }
                    startActivity(new Intent(LoginActivity.this, MainActivity.class));
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                Log.d("******", "onErrorResponse: "+volleyError);
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("password", password);
                params.put("email", phone);
                return params;
            }
        };

        RequestQueue queue = Volley.newRequestQueue(LoginActivity.this);
        queue.add(request);

    }

    private void initViews() {
        loginPhoneET = findViewById(R.id.uloginPhoneEditText);
        loginPasswordET = findViewById(R.id.uloginPasswordEditText);
    }


}