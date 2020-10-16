package com.nhau.gadget;

import android.app.Activity;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.preference.PreferenceManager;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.content.Context;
import android.os.Build;
import android.os.Bundle;
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
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.jivesoftware.smack.PacketListener;
import org.jivesoftware.smack.XMPPConnection;
import org.jivesoftware.smack.filter.MessageTypeFilter;
import org.jivesoftware.smack.filter.PacketFilter;
import org.jivesoftware.smack.packet.Message;
import org.jivesoftware.smack.packet.Packet;
import org.jivesoftware.smack.util.StringUtils;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.Set;


public class HomeActivity extends ActionBarActivity
        implements NavigationDrawerFragment.NavigationDrawerCallbacks {

    /**
     * Fragment managing the behaviors, interactions and presentation of the navigation drawer.
     */
    private NavigationDrawerFragment mNavigationDrawerFragment;

    private static HomeActivity instance;



    /**
     * Used to store the last screen title. For use in {@link #restoreActionBar()}.
     */
    private CharSequence mTitle;
    public String texts;
    public ListView allTitles;
    public static XMPPConnection connection;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        instance = this;

        mNavigationDrawerFragment = (NavigationDrawerFragment)
                getSupportFragmentManager().findFragmentById(R.id.navigation_drawer);
        //mTitle = getTitle();
mTitle="Top News";

        // Set up the drawer.
        mNavigationDrawerFragment.setUp(
                R.id.navigation_drawer,
                (DrawerLayout) findViewById(R.id.drawer_layout));
    }

    protected void onStart() {
        super.onStart();
        Misc misc=new Misc();
        if(misc.getPhone(get_activity()) == "") {
            Alert alert = new Alert(get_activity());
            alert.show(this);

        }
        else
        {
            startTask();

        }
       // Toast.makeText(get_context(),misc.getPhone(get_activity()), Toast.LENGTH_LONG).show();
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

            case 4:
                mTitle = getString(R.string.title_section4);
                break;
            case 5:
                mTitle = getString(R.string.title_section5);
                break;
            case 6:
                mTitle = getString(R.string.title_section6);
                break;
            case 7:
                mTitle = getString(R.string.title_section7);
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
            getMenuInflater().inflate(R.menu.home, menu);
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
            Alert alert = new Alert(this);
            alert.getUrl(HomeActivity.get_context());
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
            View rootView = inflater.inflate(R.layout.fragment_home, container, false);
            return rootView;
        }

        @Override
        public void onAttach(Activity activity) {
            super.onAttach(activity);
            ((HomeActivity) activity).onSectionAttached(
                    getArguments().getInt(ARG_SECTION_NUMBER));
        }
    }

    public Activity get_activity()
    {
return HomeActivity.this;
     }





    public static Context get_context()
    {
        return instance;
    }

    public void startTask() {
        String name="delon";
        String password="delon";
        String result="";
        try {
            //myAsyncTask mTask = new myAsyncTask(get_context(), get_activity());
            myAsyncTask mTask = new myAsyncTask(get_context(), HomeActivity.this);
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
        private ProgressDialog dialog = new ProgressDialog(HomeActivity.this);
        String result = "";
        Activity _activity;
        Context _context;
        XMPPConnection _connection;


        public  myAsyncTask(Context context,Activity activity)
        {
            this._activity=activity;
            this._context=context;


        }


        @Override
        protected void onPreExecute() { //do nothing
            this.dialog.setMessage("Please wait");
            this.dialog.show();

        }



        @Override
        protected String doInBackground(String...arg) { //do stuff in the background
            try {

                List<String> list=new ArrayList<String>();
                List<String> idList=new ArrayList<String>();
                SharedPreferences news= getApplicationContext().getSharedPreferences("news",MODE_PRIVATE);
                SharedPreferences.Editor editor=news.edit();


                Xmpp xmpp =new Xmpp(get_activity());
                HomeActivity.connection=xmpp.connect();
                //xmpp.setConnection(conn);
                Http http=new Http();

                texts=http.getTitles("http://10.0.2.2/andy");
                if(texts != "NO_CONNECTION"){
                Log.i("Andy",texts);
                allTitles=(ListView)findViewById(R.id.titles);
                String []arr=texts.split(";");
                // $name."-".$id."-".$date.";";;

                for (int x=0;x<arr.length;x++) {
                    String []blog=arr[x].split("-");
                    list.add(blog[0]+".-$."+blog[3]);
                    idList.add(blog[1]);
                    editor.putString(blog[1],blog[0]);

                }
                editor.commit();
                final String [] titles=list.toArray(new String[list.size()]);
                final String[] ids=idList.toArray(new String[idList.size()]);
           
                ListAdapter ad=new ArrayAdapter<String>(HomeActivity.this,android.R.layout.simple_list_item_1,titles);
                allTitles.setAdapter(ad);
                //allTitles.setOnClickListener();

                allTitles.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                    public void onItemClick(AdapterView<?> parent, View itemClicked,
                                            int position, long id) {

                        if(_activity != null) {
                            Intent intent=new Intent(_activity,ArticleActivity.class);
                            intent.putExtra("id",ids[position]);
                            startActivity(intent);
                        }
                    }});

                }
                else{
                    Toast.makeText(HomeActivity.this,"Network Error:Failed to get the news.",Toast.LENGTH_LONG).show();
                    Intent intent=new Intent(_activity,BadNetwork.class);
                    startActivity(intent);

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
