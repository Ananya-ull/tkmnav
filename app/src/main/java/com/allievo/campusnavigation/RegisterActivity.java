package com.allievo.campusnavigation;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
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

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {

    private EditText nameET, emailET, phoneET, passwordET;
    private Button registerButton;
    private String ip;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        GlobalPreference preference = new GlobalPreference(this);
        ip = preference.RetriveIP();

        initViews();

        registerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                register();
            }
        });

    }


    private void register() {

        String name = nameET.getText().toString();
        String email = emailET.getText().toString();
        String phone = phoneET.getText().toString();
        String password = passwordET.getText().toString();

        StringRequest request = new StringRequest(Request.Method.POST, "http://"+ip+"/navigation/api/register.php", new Response.Listener<String>() {
            @Override
            public void onResponse(String s) {
                Log.d("******", "onResponse: "+s.trim());
                String result = s.trim();
                if(result.equals("Success")){
                    Toast.makeText(RegisterActivity.this, "Signup Successful!", Toast.LENGTH_SHORT).show();
                    finish();
                }else{
                    Toast.makeText(RegisterActivity.this, "Failed! Please try again", Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                Log.d("******", "onErrorResponse: "+volleyError);
//                Toast.makeText(UserRegisterActivity.this, ""+volleyError, Toast.LENGTH_SHORT).show();
            }
        }){
            @Nullable
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("name", name);
                params.put("email", email);
                params.put("phone", phone);
                params.put("password", password);
                return params;
            }
        };

        RequestQueue queue = Volley.newRequestQueue(RegisterActivity.this);
        queue.add(request);

    }

    private void initViews() {

        nameET = findViewById(R.id.nameEditText);
        emailET = findViewById(R.id.emailEditText);
        phoneET = findViewById(R.id.phoneEditText);
        passwordET = findViewById(R.id.passwordEditText);
        registerButton = findViewById(R.id.registerButton);

    }


}