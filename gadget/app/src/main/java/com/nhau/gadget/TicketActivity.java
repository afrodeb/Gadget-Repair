package com.nhau.gadget;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.AsyncTask;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.content.Context;
import android.os.Build;
import android.os.Bundle;
import android.text.Html;
import android.util.Log;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.support.v4.widget.DrawerLayout;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;


public class TicketActivity extends ActionBarActivity
        implements NavigationDrawerFragment.NavigationDrawerCallbacks {

    /**
     * Fragment managing the behaviors, interactions and presentation of the navigation drawer.
     */
    private NavigationDrawerFragment mNavigationDrawerFragment;

    /**
     * Used to store the last screen title. For use in {@link #restoreActionBar()}.
     */
    private CharSequence mTitle;

    private static TicketActivity instance;
public  String response="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ticket);
        instance = this;
        Bundle extras = getIntent().getExtras();
        final String newString= extras.getString("id");
        setTitle(newString);
        startTask(newString,"","");
        mNavigationDrawerFragment = (NavigationDrawerFragment)
                getSupportFragmentManager().findFragmentById(R.id.navigation_drawer);
        mTitle = getTitle();

        // Set up the drawer.
        mNavigationDrawerFragment.setUp(
                R.id.navigation_drawer,
                (DrawerLayout) findViewById(R.id.drawer_layout));

        Button dialogOk=(Button)findViewById(R.id.submit);
        final EditText text=(EditText)findViewById(R.id.text);

        dialogOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                response=text.getText().toString();
                startTask(response,"support",newString);

            }
        });
    }

    @Override
    public void onNavigationDrawerItemSelected(int position) {
        // update the main content by replacing fragments
        FragmentManager fragmentManager = getSupportFragmentManager();
        fragmentManager.beginTransaction()
                .replace(R.id.container, PlaceholderFragment.newInstance(position + 1))
                .commit();
    }

    public void onSectionAttached(int number) {
        switch (number) {
            case 1:
                mTitle = getString(R.string.title_section1);
                break;
            case 2:
                mTitle = getString(R.string.title_section2);
                break;
            case 3:
                mTitle = getString(R.string.title_section3);
                break;
        }
    }

    public void restoreActionBar() {
        ActionBar actionBar = getSupportActionBar();
        actionBar.setNavigationMode(ActionBar.NAVIGATION_MODE_STANDARD);
        actionBar.setDisplayShowTitleEnabled(true);
        actionBar.setTitle(mTitle);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        if (!mNavigationDrawerFragment.isDrawerOpen()) {
            // Only show items in the action bar relevant to this screen
            // if the drawer is not showing. Otherwise, let the drawer
            // decide what to show in the action bar.
            getMenuInflater().inflate(R.menu.article, menu);
            restoreActionBar();
            return true;
        }
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        if (id == R.id.action_settings) {
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    /**
     * A placeholder fragment containing a simple view.
     */
    public static class PlaceholderFragment extends Fragment {
        /**
         * The fragment argument representing the section number for this
         * fragment.
         */
        private static final String ARG_SECTION_NUMBER = "section_number";

        /**
         * Returns a new instance of this fragment for the given section
         * number.
         */
        public static PlaceholderFragment newInstance(int sectionNumber) {
            PlaceholderFragment fragment = new PlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(ARG_SECTION_NUMBER, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        public PlaceholderFragment() {
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {
            View rootView = inflater.inflate(R.layout.fragment_ticket, container, false);
            return rootView;
        }

        @Override
        public void onAttach(Activity activity) {
            super.onAttach(activity);
            ((TicketActivity) activity).onSectionAttached(
                    getArguments().getInt(ARG_SECTION_NUMBER));
        }
    }

    public Activity get_activity()
    {

        return super.getParent();
        //return super.getParent();


    }



    public static Context get_context()
    {

        return instance;


    }

    public void startTask(String id,String usage,String tid) {
        String name="delon";
        String password="delon";
        String result="";
        try {

            //myAsyncTask mTask = new myAsyncTask(get_context(), get_activity());
            myAsyncTask mTask = new myAsyncTask(get_context(), TicketActivity.this,id,usage,tid);
            result = mTask.execute(name, "10", password).get();
            Log.d("SuccessLogin",result);
        }
        catch (Exception e)
        {

            Log.d("LoginError","Error occurred "+e.toString());
        }
        //return result;
    }

    class myAsyncTask extends AsyncTask<String, Integer, String> {
        String mTAG = "myAsyncTask";
        private ProgressDialog dialog = new ProgressDialog(TicketActivity.this);
        String result = "";
        Activity _activity;
        Context _context;
        String _id;
        String _usage;
        String _tid;



        public  myAsyncTask(Context context,Activity activity,String id,String usage,String tid)
        {
            this._activity=activity;
            this._context=context;
            this._id=id;
            this._usage=usage;
            this._tid=tid;
            this._usage=usage;

        }


        @Override
        protected void onPreExecute() { //do nothing
            this.dialog.setMessage("Please wait");
            this.dialog.show();

        }



        @Override
        protected String doInBackground(String...arg) { //do stuff in the background
            try {
                Xmpp xmpp =new Xmpp(get_activity());
                Misc misc=new Misc();
                Http http=new Http();

                if(_usage=="support")
                {
//(String problem,String number,String id)
                    String num = misc.getPhone(get_context());
                    //setProblem(String problem,String number,String id)
                    http.setProblem(_id,num,_tid);
                    Log.i("Andy1", _id);
                    Log.i("Andy2", _tid);
                    Log.i("Andy3", num);
                }
                else {

                    List<String> list=new ArrayList<String>();
                    List<String> idList=new ArrayList<String>();
                    String texts;

                    xmpp.connect();


                    texts=http.getTicket(_id);
                    String output="";
                    Log.i("Andy", texts);
                    output=""+Html.fromHtml(texts);

                    TextView view= (TextView)findViewById(R.id.article);
                    ImageView img=(ImageView)findViewById(R.id.imageView);


                    view.setText(output);


                }

            }
            catch (Exception ex) {
                Log.i("Error", "Error occurred " + ex.toString());
            }



            try {
                Thread.sleep(100);
            }
            catch (InterruptedException e) {
                e.printStackTrace();
            }

            return result;
        }

        @Override
        protected void onPostExecute(String result) {
            if (dialog.isShowing()) {
                dialog.dismiss();
            }
        }

    }



}
